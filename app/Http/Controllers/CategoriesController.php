<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{

    public function index()
    {
        $result = Category::all();
        return response()->json([
            'data' => $result,
            'error' => false
        ]);
    }


    public function store(Request $request)
    {
        Category::create([
            'name' => $request->name
        ]);
        return response()->json([
            'message' => "category created successfully",
            'error' => false
        ]);
    }


    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json(["message" => "Category deleted successfully"]);
    }
}
