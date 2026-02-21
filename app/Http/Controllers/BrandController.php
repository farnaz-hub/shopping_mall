<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Services\BrandService;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    protected $service;

    public function __construct(BrandService $service)
    {
        $this->service = $service;
    }


    public function add()
    {
        return view('brand.add');
    }


    public function save(Request $request)
    {
        $this->service->create($request->all());

        return redirect(route('brand.list'));
    }


    public function list()
    {
        $brands = $this->service->list();
        return view('brand.list', compact('brands'));
    }


    public function show(Brand $brand)
    {
        return view('brand.edit', compact('brand'));
    }


    public function update(Request $request, Brand $brand)
    {
        $this->service->update($brand, $request->all());

        return redirect(route('brand.list'));
    }


    public function delete(Brand $brand)
    {
        $this->service->delete($brand);
        return redirect(route('brand.list'));
    }
}
