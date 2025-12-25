<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Type;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function add()
    {
        $types = Type::all();
        return view('category.add', compact('types'));
    }


    public function save(Request $request)
    {
        Category::create([
            'type_id' => $request->get('type_id'),
            'title' => $request->get('title'),
        ]);

        return redirect(route('category.list'));
    }


    public function list()
    {
        $categories = Category::all();
        return view('category.list',compact('categories'));
    }


    public function show(Category $category)
    {
        $types = Type::all();
        return view('category.edit', compact('category', 'types'));
    }


    public function update(Request $request, Category $category)
    {
        $category->type_id = $request->get('type_id');
        $category->title = $request->get('title');
        $category->update();

        return redirect(route('category.list'));
    }


    public function delete(Category $category)
    {
        $category -> delete();
        return redirect(route('category.list'));
    }
}
