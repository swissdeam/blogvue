<?php

namespace App\Http\Controllers;

use App\Http\Requests\api\PostCreateReq;
use App\Models\Post;
use Illuminate\Http\Request;

class CreatePostController extends Controller
{
    public function creating(PostCreateReq $request)  :\Illuminate\Http\JsonResponse
    {
              $post  = Post::create([
                  'user_id'=>$request->get('user_id'),
                  'title' => $request->get('title'),
                  'body' => $request->get('body'),
              ]);

//            $is_admin = $user->is_admin;
            return response()->json(["message"=>"post created"], 200);
    }
}
