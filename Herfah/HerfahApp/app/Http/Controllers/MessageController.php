<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use App\Notifications\MessagesNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.reviews.messages');
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
    public function store(Request $request)
    {
        $message = new Message();
        $message->Message_Title = $request->title;
        $message->Message_Body = $request->message;
        $message->user_id = auth()->user()->id;
        $message->save();
        $users = User::where('Autho', 0)->get();
        $user_create = auth()->user()->name;
        Notification::send($users, new MessagesNotification($user_create));
        return redirect()->back()->with('success', 'تمت إرسال الرسالة بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        //
    }
}
