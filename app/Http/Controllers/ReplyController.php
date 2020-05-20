<?php

namespace App\Http\Controllers;

use App\Model\Reply;
use App\Model\Question;
use Illuminate\Http\Request;
use App\Http\Resources\ReplyResource;
use App\notifications\newReplyNotification;

class ReplyController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('JWT', ['except' => ['index' ,'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Question $question)
    {
        return ReplyResource::collection($question->replies()->latest()->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Question $question,Request $request)
    {
        $reply = $question->replies()->create($request->all());

        //Sending notification to database
        $user = $question->user; // The question Owner
        if($reply->user_id !== $question->user_id) // Check The reply dosn't belong to the owner of the question
            $user->notify(new newReplyNotification($reply)); // pass Reply to notification to save spacific date in database 

        return response( new ReplyResource($reply) , 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question ,Reply $reply)
    {
        return new ReplyResource($reply);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function update(Question $question, Request $request, Reply $reply)
    {
        $reply->update($request->all());
        return response([
            'updated' => new ReplyResource($reply)
            ] , 202);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question, Reply $reply)
    {
        $reply->delete();
        return response(null , 204);
    }
}
