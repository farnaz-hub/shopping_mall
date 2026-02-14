<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveCustomerRequest;
use App\Models\Address;
use App\Models\city;
use App\Models\Customer;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function add()
    {
        $provinces = Province::all();
        $cities = city::all();
        return view('customer.add', compact('provinces', 'cities'));
    }


    public function save(SaveCustomerRequest $request)
    {
        $customer = Customer::create([
            'name' => $request->get('name'),
            'family' => $request->get('family'),
            'mobile' => $request->get('mobile'),
            'gender' => $request->get('gender'),
            'birth_date' => $request->get('birth_date'),
            'national_code' => $request->get('national_code'),
            'province_id' => $request->get('province_id'),
            'city_id' => $request->get('city_id'),
            'job' => $request->get('job'),
            'username' => $request->get('username'),
            'password' => $request->get('password'),
            'lat' => $request->get('lat'),
            'lan' => $request->get('lan'),
        ]);

        $postal_codes = $request->get('postal_code');
        $units = $request->get('unit');
        $titles = $request->get('title');
        $addresses = $request->get('address', []);     // [] --> Default empty array, to prevent foreach error if no address is submitted.
        // Because foreach is applying just on addresses we use [] just for addresses part.
        foreach ($addresses as $index => $address) {
            if (!empty($address)) {
                Address::create([
                    'customer_id' => $customer->id,
                    'address' => $address,
                    'postal_code' => $postal_codes[$index],
                    'unit' => $units[$index],
                    'title' => $titles[$index],
                ]);
            }
        }

        return redirect(route('customer.list'));
    }


    public function list()
    {
        $customers = Customer::paginate(10);
        return view('customer.list', compact('customers'));
    }


    public function show(Customer $customer)
    {
        $provinces = Province::all();
        $cities = city::all();
        return view('customer.edit', compact('customer', 'provinces', 'cities'));
    }


    public function update(Request $request, Customer $customer)
    {
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

        $postal_codes = $request->get('postal_code');
        $units = $request->get('unit');
        $titles = $request->get('title');
        $addresses = $request->get('address', []);
        $address_ids = $request->get('address_id', []);                //getting address from form

        $address_id_in_db = $customer->addresses()->pluck('id')->toArray(); //all of previous customers addresses //addresses function came from Customer model
        $deleted_ids = array_diff($address_id_in_db, $address_ids);     //$address_ids = list of ids that came from view
        foreach ($deleted_ids as $deleted_id) {
            $address = Address::find($deleted_id);
            $address->delete();
        }

        foreach ($addresses as $index => $address) {
            if (!empty($address_ids[$index]) && !empty($address)) {         //address_id and address have some value and they must get update
                $old_address = Address::find($address_ids[$index]);         //getting old record from DB and set new values
                $old_address->title = $titles[$index];
                $old_address->postal_code = $postal_codes[$index];
                $old_address->unit = $units[$index];
                $old_address->address = $address;
                $old_address->update();
            } else {
                if (!empty($address)) {                                     //address is not empty but address_id is empty and doesn't have value so new address must be created
                    $customer->addresses()->createMany([
                        ['address' => $address, 'postal_code' => $postal_codes[$index], 'unit' => $units[$index], 'title' => $titles[$index]]
                    ]);

//                    Address::create([
//                        'customer_id' => $customer->id,
//                        'address' => $address,
//                        'postal_code' => $postal_codes[$index],
//                        'unit' => $units[$index],
//                        'title' => $titles[$index],
//                    ]);
                }
            }
        }

        return redirect(route('customer.list'));
    }


    public function delete(Customer $customer)
    {
        $customer->delete();
        return redirect(route('customer.list'));
    }
}
