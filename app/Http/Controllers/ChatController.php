<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\Message;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;


class ChatController extends Controller
{
   
       public function sendMessage(Request $request)
        {
            $request->validate([
                'message' => 'required|string|max:1000',
            ]);
    
            $message = Message::create([
                'user_id' => auth()->id(),
                'message' => $request->message,
            ]);
    
            broadcast(new MessageSent($message))->toOthers();
    
            return response()->json(['message' => $message], 201);
        }
    }
    

