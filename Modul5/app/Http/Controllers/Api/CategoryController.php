<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'success' => false,
                'error' =>
                $validator->errors()->toArray()
            ], 400);
        }

        $user = Category::create([
            'nama' => $request->input('nama'),
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
    public function tampil()
    {
        $category = Category::all();
        return response()->json([
            'message' => 'All Category!',
            'categories' => $category
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
        $category = Category::where('id', $id)->first();

        if (!$category) {
            return response()->json([
                'status' => 'error',
                'success' => false,
                'error' => 'Id Category not found'
            ], 400);
        } else {
            return response()->json([
                'message' => 'Category!',
                'category' => $category
            ]);
        }
    }

  
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'success' => false,
                'error' =>
                $validator->errors()->toArray()
            ], 400);
        }

        Category::where('id', $id)->update([
            'nama' => $request->input('nama'),
        ]);

        $data = Category::where('id', $id)->first();
        return response()->json([
            'message' => 'User has been updated!',
            'category' => $data
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
        $data = Category::where('id', $id)->delete();

        if (!$data) {
            return response()->json([
                'status' => 'error',
                'success' => false,
                'error' => 'Id Category not found'
            ], 400);
        } else {
            return response()->json([
                'message' => 'Category!',
                'category' => $data
            ]);
        }

    }
}
