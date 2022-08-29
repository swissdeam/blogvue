<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class AdminController extends Controller
{
    public function showUsers()
    {
        $people = User::all();
        return $people;
    }

    public function deleteUser($user_id): JsonResponse
    {
        $user = User::query()->findOrFail($user_id);
        $user->delete();
        return response()->json(["status" => "success", "user_id" => $user_id], 200);
    }

    public function deletePost($user_id, $post_id): JsonResponse
    {
        Post::where('id', $post_id)->delete();
        return response()->json(["status" => "success", "post_id" => $post_id], 200);
    }

    public function showPosts($user_id): JsonResponse
    {
        $posts = Post::where('user_id', $user_id)->get();
        return response()->json(["posts" => $posts], 200);
    }
}
