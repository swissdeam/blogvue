<?php

namespace App\Http\Controllers;

use App\Http\Requests\api\PostCreateReq;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $user_id = $request->user()->id;
        $posts = Post::where('user_id', $user_id)->get();
        return response()->json(["posts" => $posts], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {

        return null;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PostCreateReq $request
     *
     *
     *
     * @return JsonResponse
     */
    public function store(PostCreateReq $request): JsonResponse
    {
        Post::create([
            'user_id' => $request->get('user_id'),
            'title' => $request->get('title'),
            'body' => $request->get('body'),
        ]);

        return response()->json(["message" => "post created"], 200);
    }

    /**
     * Display the specified resource.
     *
     * //* @param Post $id
     * @return JsonResponse
     */
    public function show($post_id): JsonResponse
    {
        $post = Post::where('id', $post_id)->first();
        return response()->json(['post' => $post], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     * @return Response
     */
    public function edit(Post $post)
    {
        return null;
    }

    /**
     * Update the specified resource in storage.
     *
     *
     *
     * // * @param Post $post
     * @param $post_id
     * @return JsonResponse
     */
    public function update($post_id, Request $request): JsonResponse
    {
        $post = Post::where('id', $post_id)->first();
        $post->update(
            [
                'title' => $request->get('title'),
                'body' => $request->get('body'),
            ]
        );
        return response()->json(["message" => "post edited", "post" => $post_id], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * // * @param Post $post
     * @return JsonResponse
     */
    public function destroy($post_id): JsonResponse
    {
        Post::where('id', $post_id)->delete();
        return response()->json(["status" => "success"], 200);
    }
}
