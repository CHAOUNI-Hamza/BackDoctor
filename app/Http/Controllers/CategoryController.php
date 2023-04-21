<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

         $order_by = $request->input('order_by', 'id');
        $query = Category::orderBy($order_by);

    if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
    }

    if ($request->filled('pagination')) {
            $categories = $query->paginate($request->pagination);
            return CategoryResource::collection($categories);
    }

    $categories = $query->get();

    return CategoryResource::collection($categories);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $category = new Category;

        $category->name = $request->name;

        if ($request->hasFile('icone')) {
            $path = $request->file('icone')->store('public/clients');  
            $category->icone = Storage::url($path);
        }

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('public/clients');  
            $category->photo = Storage::url($path);
        }

        

        $category->save();

        return new CategoryResource($category);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $category = Category::find($category->id);

    if (!$category) {
        return response()->json(['message' => 'User not found'], 404);
    }

    return new CategoryResource($category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $category = Category::find($category->id);

    if (!$category) {
        return response()->json(['message' => 'User not found'], 404);
    }

    return new CategoryResource($category);
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category = Category::find($category->id);

        $category->name = $request->name;

        if ($request->hasFile('icone')) {
            $path = $request->file('icone')->store('public/clients');  
            $category->icone = Storage::url($path);
        }

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('public/clients');  
            $category->photo = Storage::url($path);
        }

        

        $category->save();

        return new CategoryResource($category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return new CategoryResource($category);
    }
}
