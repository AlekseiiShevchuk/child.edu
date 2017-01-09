<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all()->where('parent_id', '=', null);
        $categories->load('children');
        // can load parent inside the category
        /*foreach ($categories as $category){
            $category->children->load('parent');
        }*/
        return response()->json($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CategoryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $category = Category::create($request->all());
        return response()->json($category, 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CategoryRequest $request
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->all());
        return response()->json($category);
    }
}
