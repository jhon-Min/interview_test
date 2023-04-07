<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Resources\PostListsResource;

class PostController extends Controller
{
    public function list()
    {
        $posts = Post::with(['tags', 'likes'])->paginate();
        return PostListsResource::collection($posts);
    }

    public function toggleReaction(Request $request)
    {
        $request->validate([
            'post_id' => 'required|int|exists:posts,id',
            'like'   => 'required|boolean'
        ]);

        $post = Post::findOrFail($request->post_id);

        $like = Like::where('post_id', $request->post_id)
            ->where('user_id', auth()->id())
            ->first();

        if ($like && $request->like) {
            return response()->json([
                'status' => 500,
                'message' => 'You have already liked this post',
            ]);
        }

        if ($like && !$request->like) {
            $like->delete();
            $message = 'You have unliked this post successfully';
        } else {
            Like::create([
                'post_id' => $request->post_id,
                'user_id' => auth()->id(),
            ]);
            $message = 'You have liked this post successfully';
        }

        return response()->json([
            'status' => 200,
            'message' => $message,
        ]);
    }
}
