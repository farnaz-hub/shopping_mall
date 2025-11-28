<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function add(){
        return view('product.add');
    }


    public function save(Request $request){
        Product::create([
            'title' =>$request->get('title'),
            'description' =>$request->get('description'),
            'slug' =>$request->get('slug'),
            'image' =>$request->get('image'),
            'brand_id' =>$request->get('brand_id'),
            'unlimited_inventory' =>$request->get('unlimited_inventory'),
            'max_order' =>$request->get('max_order'),
            'warning_border' =>$request->get('warning_border'),
        ]);

        return redirect(route('product.list'));
    }


    public function list(){
        $products = Product::all();
        return view('product.list', compact('products'));
    }


    public function show(Product $product){
        return view('product.edit', compact('product'));
    }


    public function update(Request $request, Product $product){
        $product->title = $request->get('title');
        $product->description = $request->get('description');
        $product->slug = $request->get('slug');
        $product->image = $request->get('image');
        $product->brand_id = $request->get('brand_id');
        $product->unlimited_inventory = $request->get('unlimited_inventory');
        $product->max_order = $request->get('max_order');
        $product->warning_border = $request->get('warning_border');
        $product->update();

        return redirect(route('product.list'));
    }


    public function delete(Product $product){
        $product->delete();
        return redirect(route('product.list'));
    }
}
