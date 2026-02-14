<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function add()
    {
        return view('brand.add');
    }


    public function save(Request $request)
    {
        Brand::create([
            'title' => $request->get('title'),
        ]);

        return redirect(route('brand.list'));
    }


    public function list()
    {
        $brands = Brand::all();
        return view('brand.list', compact('brands'));
    }


    public function show(Brand $brand)
    {
        return view('brand.edit', compact('brand'));
    }


    public function update(Request $request, Brand $brand)
    {
        $brand->title = $request->get('title');
        $brand->update();

        return redirect(route('brand.list'));
    }


    public function delete(Brand $brand)
    {
        $brand->delete();
        return redirect(route('brand.list'));
    }
}
