<?php

namespace App\Services;

use App\Models\Brand;

class BrandService
{
    public function create(array $data)
    {
        return Brand::create([
            'title' => $data['title'],
        ]);
    }


    public function list()
    {
        return Brand::all();
    }


    public function update(Brand $brand, array $data)
    {
        $brand->update([
            'title' => $data['title'],
        ]);

        return $brand;
    }


    public function delete(Brand $brand)
    {
        return $brand->delete();
    }
}
