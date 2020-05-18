<?php

namespace App\Http\Controllers;
use App\Model\Like;
use App\Model\Reply;
use Illuminate\Http\Request;

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
        return response('Created' , 201);
    }

    public function unLikeIt(Reply $reply)
    {
         $reply->likes->where('user_id',auth()->id())->first()->delete();
    }
}
