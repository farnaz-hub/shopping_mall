<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function add()
    {
        return view('type.add');
    }


    public function save(Request $request)
    {
        Type::create([
            'title' => $request->get('title'),
        ]);

        return redirect(route('type.list'));
    }


    public function list()
    {
        $types = Type::all();
        return view('type.list',compact('types'));
    }


    public function show(Type $type)
    {
        return view('type.edit', compact('type'));
    }


    public function update(Request $request, Type $type)
    {
        $type->title = $request->get('title');
        $type->update();

        return redirect(route('type.list'));
    }


    public function delete(Type $type)
    {
        $type->delete();
        return redirect(route('type.list'));
    }
}
