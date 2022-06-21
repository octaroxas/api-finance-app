<?php

namespace App\Http\Controllers\API\Transaction;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all(['id', 'name']);
        return response()->json($categories);
    }

    public function store(Request $request)
    {
        $category = Category::firstOrCreate($request->all());
        return response()->json(compact('category'), Response::HTTP_CREATED);
    }

    public function show(Category $category)
    {
        return response()->json(compact('category'), Response::HTTP_OK);
    }

    public function update(Category $category, Request $request)
    {
        $category->update($request->all());
        $category->save();
        return response()->json(compact('category'), Response::HTTP_OK);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return response()->noContent(Response::HTTP_OK);
    }
}
