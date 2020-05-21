<?php

namespace App\Http\Controllers;
use App\Model\Like;
use App\Model\Reply;
use Illuminate\Http\Request;
use App\Events\LikeEvent;

class LikeController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('JWT');
    }
    
    public function likeIt(Reply $reply)
    {
        $reply->likes()->create(['user_id' => auth()->id()]);
        broadcast(new LikeEvent($reply->id,1))->toOthers();
        return response('Created' , 201);
    }

    public function unLikeIt(Reply $reply)
    {
        $reply->likes->where('user_id',auth()->id())->first()->delete();
        broadcast(new LikeEvent($reply->id,0))->toOthers();
    }
}
