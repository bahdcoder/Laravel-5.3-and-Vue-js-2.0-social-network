<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class FriendshipsController extends Controller
{
    public function check($id)
    {
        if(Auth::user()->is_friends_with($id) === 1)
        {
            return [ "status" => "friends" ];
        }
        
        if(Auth::user()->has_pending_friend_request_from($id))
        {
            return [ "status" => "pending" ];
        }

        if(Auth::user()->has_pending_friend_request_sent_to($id))
        {
            return [ "status" => "waiting" ];
        }

        return [ "status" => 0 ];
    }
}
