<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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


    public function save(Request $request)
    {
        $brand = $this->service->create($request->all());

        return response()->json([
            'message' => 'Brand saved',
            'brand' => $brand
        ]);
    }


    public function list()
    {
        return [
            'success' => true,
            'data' => $this->service->list()
        ];
    }


    public function update(Request $request, Brand $brand)
    {
        $brand = $this->service->update($brand, $request->all());

        return response()->json([
            'message' => 'Brand updated',
            'brand' => $brand
        ]);
    }


    public function delete(Brand $brand)
    {
        $this->service->delete($brand);

        return response()->json([
            'message' => 'Brand deleted'
        ]);
    }
}
