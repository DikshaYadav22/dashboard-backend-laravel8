<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;
use App\Notifications\ReplyNotification;

class PostsController extends Controller
{

    public function index()
    {
        $postData = Post::all();
        return response()->json(['data' => $postData, 'error' => false]);
    }

    public function store(Request $request)
    {
        Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'category_id' => $request->category_id
        ]);
        return response()->json(['message' => 'Post added successfully', 'error' => false]);
    }


    public function show(Post $post)
    {
        return response()->json([
            "data" => $post,
            "comment" => $post->comments,
            'error' => false
        ]);
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }

    public function addReply($id, Request $request)
    {
        Comment::create([
            'post_id' => $id,
            'comment' => $request->comment
        ]);
        $user = $request->user();
        $user->notify(new ReplyNotification);
        return response()->json([
            'message' => "reply is successfully added",
            'error' => false
        ]);
    }
}
