<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostsRequest;
use App\Http\Requests\UpdatePostsRequest;

class PostsController extends Controller
{
    public function posts(){
        return view('posts.posts',[
            'data' => Posts::paginate(10),
            'title' => 'All Posts',
            'active' => 'posts',
        ]);
    }

    public function add(){
        return view('posts.add', [
            'categories' => Category::all(),
            'title' => 'Add Posts',
            'active' => 'posts',
        ]);
    }

    public function push(Request $request){
        $cek = Posts::where('nama', $request->nama)->first();
        
        if($cek == null){
            Posts::insert([
                'category_id' => $request->category_id,
                'nama' => $request->nama,
                'tampil' => $request->tampil,
                'body' => $request->body,
                'img' => $request->img,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } else {
            return redirect('posts/add');
        }

        return redirect('posts');
    }

    public function edit($id){
        return view('posts.edit', [
            'data' => Posts::where('id', $id)->first(),
            'categories' => Category::all(),
            'title' => 'Edit Posts',
            'active' => 'posts',
        ]);
    }
    public function update(Request $request){
        Posts::where('id', $request->id)->update([
            'nama' => $request->nama,
            'category_id' => $request->category_id,
            'tampil' => $request->tampil,
            'body' => $request->body,
            'updated_at' => now(),
        ]);
        return redirect('posts');
    }

    public function delete(Posts $posts){
        $id = $posts->id;
        Posts::where('id', $id)->delete();
        return redirect('posts');
    }
}
