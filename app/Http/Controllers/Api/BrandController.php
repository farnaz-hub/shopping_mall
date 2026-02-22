<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BrandResource;
use App\Models\Brand;
use App\Services\BrandService;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function __construct(public BrandService $service)
    {
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
        $brands = $this->service->list();

        return response()->json([
            'success' => true,
            'data' => BrandResource::collection($brands)
        ]);
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
