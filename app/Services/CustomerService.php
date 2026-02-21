<?php

namespace App\Services;

use App\Models\Customer;

class CustomerService
{
    public function cerate(array $data)
    {
        return Customer::all([
            'name' => $data['name'],
            'family' => $data['family'],
            'mobile' => $data['mobile'],
            'gender' => $data['gender'],
            'birth_date' => $data['birth_date'],
            'national_code' => $data['national_code'],
            'province_id' => $data['province_id'],
            'city_id' => $data['city_id'],
            'job' => $data['job'],
            'username' => $data['username'],
            'password' => $data['password'],
            'lat' => $data['lat'],
            'lan' => $data['lan'],
        ]);
    }
}
