<?php

namespace App\Http\Controllers;

use Abraham\TwitterOAuth\Request;
use App\Http\Requests\StoreSubscriptionRequest;
use App\Http\Requests\UpdateSubscriptionRequest;
use App\Models\Channel;
use App\Models\ChatBot;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user      = Auth::user();
        // return $user;
        $user = User::where('twitter_id', $user->twitter_id)->first();
        $botId = Subscription::where('user_id', $user->twitter_id)->first();
        $botName = ChatBot::where('id', $botId['chatbot_id'])->first();
        $channel = Channel::where('id', $botId['chatbot_id'])->first();
        return response()->json([
            'statusCode' => 200,
            'Bot Name' => $botName,
            'User Name' => $user,
            'Channel Name' => $channel
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubscriptionRequest $request)
    {
        $sub = new Subscription();
        $sub->user_id = $request->header('user_id');
        $sub->chatbot_id = $request->bot_id;
        $sub->channel_id = $request->channel_id;
        $sub->save();
        if (!empty($sub->channel_id) && empty($sub->chatbot_id)) {
            return response()->json([
                'statusCode' => 200,
                'message' => 'you have sucessfuly subcribe to our channel'
            ]);
        } elseif (!empty($sub->chatbot_id) && empty($sub->channel_id)) {
            return response()->json([
                'statusCode' => 200,
                'message' => 'you have sucessfuly subcribe to our bot'
            ]);
        }
        return response()->json([
            'statusCode' => 200,
            'message' => 'you have sucessfuly subcribe to our bot and channel'
        ]);
    }
}
