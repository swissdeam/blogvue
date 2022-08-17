<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ShowPostsController extends Controller
{
    public function __invoke(Request $request) : \Illuminate\Http\JsonResponse
    {
        $user_id = $request->user()->id;
        $posts = Post::where('user_id', $user_id)->get();
        return response()->json(["posts"=>$posts], 200);
    }
    public function showForAdmin($user_id) : \Illuminate\Http\JsonResponse
    {
        $posts = Post::where('user_id', $user_id)->get();
        return response()->json(["posts"=>$posts], 200);
    }
    public function searchUsers($email) : \Illuminate\Http\JsonResponse
    {
        $search_user = User::where('email', $email)->first('id');
        $search_user_name = User::where('id', $search_user->id)->first('name');
        $posts = Post::where('user_id', $search_user->id)->get();
        return response()->json(["posts"=>$posts, "user"=>$search_user_name], 200);
    }

    public function feedPosts() : \Illuminate\Http\JsonResponse
    {
        $posts = Post::with('user')->get();
        return response()->json(["posts"=>$posts], 200);
    }

}
