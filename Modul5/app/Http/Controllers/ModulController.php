<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Posts;
use \App\Models\User;
use \App\Models\Category;
use Illuminate\Support\Facades\Auth;

class ModulController extends Controller
{
    public function index(){
        $posts = Posts::all();
        return view('modul.index',[
            'posts' => $posts
        ]);
    }
    
    public function profile(){
        return view('modul.profile');
    }
    
    public function category(Category $category){
        $posts = Posts::where('category_id', $category->id)->get();
        return view('modul.index',[
            'posts' => $posts
        ]);
    }

    public function login(){
        return view('login');
    }

    public function cekLogin(Request $request){
        $user = $request->email;
        $pass = $request->password;

        $user = User::where([
            'email' => $user,
            'password' => $pass
        ])->first();

        $credentials = request(['email', 'password']);

        $data = Auth::attempt($credentials);

        if($data){
            return redirect('/dashboard');
        } else {
            return redirect('/login');
        }

    }

    public function dashboard(){
        return view('admin');
    }

    public function users(){
        $data = User::all();
        return view('users',[
            'data' => $data
        ]);
    }

    public function categories(){
        $data = Category::all();
        return view('category',[
            'data' => $data
        ]);
    }

    public function posts(){
        $data = Posts::all();
        return view('posts',[
            'data' => $data
        ]);
    }
}
