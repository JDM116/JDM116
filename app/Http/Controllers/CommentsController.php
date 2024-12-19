<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\comment;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function index() {
        $comments = comment::orderBy('created_at', 'desc')->get();
        return view('show', compact('comment'));
    }

    public function create(Request $request) {
        comment::create([
            'mains_id' => $request -> mains_id,
            'author' => $request -> author,
            'body' => $request -> body
        ]);
        return redirect('/show');
    }
}
