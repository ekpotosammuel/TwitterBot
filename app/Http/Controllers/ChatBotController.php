<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChatBotRequest;
use App\Http\Requests\UpdateChatBotRequest;
use App\Models\ChatBot;

class ChatBotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreChatBotRequest $request)
    {
        $bot = new ChatBot();
        $bot->name = $request->name;
        $bot->save();
        return response()->json([
            'statusCode' => 200,
            'message' => 'bot created successfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(ChatBot $chatBot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ChatBot $chatBot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChatBotRequest $request, ChatBot $chatBot)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ChatBot $chatBot)
    {
        //
    }
}
