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
}
