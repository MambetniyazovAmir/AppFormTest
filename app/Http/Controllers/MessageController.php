<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MessageController extends Controller
{
    public function index()
    {
        if (Auth::user()->hasRole('user')) {
            return view('message.create');
        } elseif (Auth::user()->hasRole('manager')) {
            $messages = Message::latest()->get();
            return view('message.data', compact('messages'));
        } else
            return redirect('/')->with('error', 'You don\'t have right access');
    }

    public function store(MessageRequest $request)
    {
        $message = Message::create($request->validated());

        $fileName = Str::random(10) . '.' . $request->file('file')->getClientOriginalExtension();
        $message->update(
            ['file' => 'message/' . $fileName,]
        );
        $request->file('file')->storeAs('public/message', $fileName);

        return back()->with('success', 'Succesfully created message');
    }

    public function update(Request $request, Message $message)
    {
        $message->update([
            'status' => true
        ]);
        return back()->with('success', 'Message read');
    }

    public function destroy(Message $message)
    {
        Storage::disk('public')->delete($message->file);
        $message->delete();
        return back()->with('success', 'Message removed');
    }
}
