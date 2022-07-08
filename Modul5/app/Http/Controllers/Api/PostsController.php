<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Posts;
use Illuminate\Support\Facades\Validator;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['except' => ['index']]);
    }
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'category_id' => 'required',
            'tampil' => 'required',
            'body' => 'required',
            'img' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'success' => false,
                'error' =>
                $validator->errors()->toArray()
            ], 400);
        }

        $user = Posts::create([
            'nama' => $request->input('nama'),
            'category_id' =>$request->input('category_id'),
            'tampil' =>$request->input('tampil'),
            'body' =>$request->input('body'),
            'img' => $request->input('img'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        return response()->json([
            'message' => 'User has been created!',
            'user' => $user
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Posts::all();
        return response()->json([
            'message' => 'All Posts!',
            'posts' => $post
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Posts::where('id', $id)->first();

        if (!$post) {
            return response()->json([
                'status' => 'error',
                'success' => false,
                'error' => 'Id Category not found'
            ], 400);
        } else {
            return response()->json([
                'message' => 'Post!',
                'post' => $post
            ]);
        }
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'category_id' => 'required',
            'tampil' => 'required',
            'body' => 'required',
            'img' => 'required',
            
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'success' => false,
                'error' =>
                $validator->errors()->toArray()
            ], 400);
        }

        Posts::where('id', $id)->update([
            'nama' => $request->input('nama'),
            'category_id' =>$request->input('category_id'),
            'tampil' =>$request->input('tampil'),
            'body' =>$request->input('body'),
            'img' => $request->input('img'),
        ]);

        $data = Posts::where('id', $id)->first();
        return response()->json([
            'message' => 'User has been updated!',
            'post' => $data
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Posts::where('id', $id)->delete();

        if (!$data) {
            return response()->json([
                'status' => 'error',
                'success' => false,
                'error' => 'Id Category not found'
            ], 400);
        } else {
            return response()->json([
                'message' => 'Post!',
                'post' => $data
            ]);
        }

    }
}
