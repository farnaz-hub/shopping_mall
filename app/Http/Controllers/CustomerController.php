<?php

namespace App\Http\Controllers;

use App\Models\city;
use App\Models\Customer;
use App\Models\Province;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function add(){
        $provinces = Province::all();
        $cities = city::all();
        return view('customer.add', compact('provinces', 'cities'));
    }


    public function save(Request $request){
        Customer::create([
            'name' =>$request->get('name'),
            'family' =>$request->get('family'),
            'mobile' =>$request->get('mobile'),
            'gender' =>$request->get('gender'),
            'birth_date' =>$request->get('birth_date'),
            'national_code' =>$request->get('national_code'),
            'province_id' =>$request->get('province_id'),
            'city_id' =>$request->get('city_id'),
            'job' =>$request->get('job'),
            'username' =>$request->get('username'),
            'password' =>$request->get('password'),
            'lat' =>$request->get('lat'),
            'lan' =>$request->get('lan'),
        ]);

        return redirect(route('customer.list'));
    }


    public function list(){
        $customers = Customer::all();
        return view('customer.list', compact('customers'));
    }


    public function show(Customer $customer){
        return view('customer.edit', compact('customer'));
    }


    public function update(Request $request, Customer $customer){
        $customer->name = $request->get('name');
        $customer->family = $request->get('family');
        $customer->mobile = $request->get('mobile');
        $customer->gender = $request->get('gender');
        $customer->birth_date = $request->get('birth_date');
        $customer->national_code = $request->get('national_code');
        $customer->province_id = $request->get('province_id');
        $customer->city_id = $request->get('city_id');
        $customer->job = $request->get('job');
        $customer->username = $request->get('username');
        $customer->password = $request->get('password');
        $customer->lat = $request->get('lat');
        $customer->lan = $request->get('lan');
        $customer->update();

        return redirect(route('customer.list'));
    }


    public function delete(Customer $customer){
        $customer->delete();
        return redirect(route('customer.list'));
    }
}
