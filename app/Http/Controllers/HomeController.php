<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::latest()->get();

        return view('home', compact('comments'));
    }

    public function create()
    {
        return view('comments.create');
    }

    public function store()
    {
        $this->validate(request(), [
            'comment' => 'required',
            ]
        );

        $comment = Comment::create([
            'user_id' => auth()->id(),
            'body' => request('comment')
        ]);

        Log::notice($comment->user->name . ' commented, "' . $comment->body . '"');

        return redirect('/');
    }

    public function show(Comment $comment)
    {
        return view('comments.show', compact('comment'));
    }

    public function edit(Comment $comment)
    {
        if (auth()->id() != $comment->user->id) {
            session()->flash('message', 'Unauthorized access.');

            return back();
        }

        return view('comments.edit', compact('comment'));
    }

    public function update(Comment $comment)
    {
        $this->validate(request(), [
            'comment' => 'required',
            ]
        );

        $comment->update([
            'body' => request('comment')
            ]
        );

        return redirect('/');
    }

    public function delete(Comment $comment)
    {
        if (auth()->id() != $comment->user->id) {
            session()->flash('message', 'Unauthorized access.');

            return back();
        }

        return view('comments.delete', compact('comment'));
    }

    public function destroy(Comment $comment)
    {
        if (auth()->id() != $comment->user->id) {
            session()->flash('message', 'Unauthorized access.');

            return back();
        }
        
        $comment->delete();

        return redirect('/');
    }

}
