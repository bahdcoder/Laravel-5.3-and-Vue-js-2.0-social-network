<?php

namespace App\Http\Controllers;

use Auth;
use App\Post;
use App\Like;
use Illuminate\Http\Request;

class LikesController extends Controller
{
    public function like($id)
    {
        $post = Post::find($id);

        return Like::create([
            'user_id' => Auth::id(),
            'post_id' => $post->id
        ]);
    }

    public function unlike($id)
    {
        $post = Post::find($id);
        

        Like::where('user_id', Auth::id())
            ->where('post_id', $post->id)
            ->first()
            ->delete();

        return 1;
    }
}
