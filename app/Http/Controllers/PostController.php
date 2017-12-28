<?php
/**
 * Created by PhpStorm.
 * User: GideonST
 * Date: 12/28/2017
 * Time: 10:03 AM
 */

namespace App\Http\Controllers;


use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return Post::all();
//        return 'menampilkan posts';
    }

    public function show($id)
    {
        $post = Post::find($id);
        if (!$post) {
            return response()->json([
                'message' => 'post not found'
            ]);
        }
        return $post;
//        return 'menampilkan berdasarkan id dari post';
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        if ($post) {
            $post->update($request->all());
            return response()->json([
                'message' => 'post has been updated'
            ]);
        }
        return response()->json([
            'message' => 'Post not found',
        ], 404);
//        return 'menampilkan update dari post';
    }


    public function store(Request $request)
    {
        $this->validate($request,
            ['title' => 'required',
                'body' => 'required']);
        return Post::create($request->all());
    }

    public function delete(Request $request, $id)
    {
        $post = Post::find($id);
        if ($post) {
            $post->delete($request->all());
            return response()->json([
                'message' => 'post has been deleted'
            ]);
        }
        return response()->json([
            'message' => 'post not found',
        ], 404);
    }
}