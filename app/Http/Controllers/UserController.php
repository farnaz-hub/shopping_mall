<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Province;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function add()
    {
        $provinces = Province::all();
        $cities = City::all();
        return view('user.add', compact('provinces', 'cities'));
    }


    public function save(Request $request)
    {
        User::create([
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

        return redirect(route('user.list'));
    }


    public function list()
    {
        $users = User::all();
        return view('user.list', compact('users'));
    }


    public function show(User $user)
    {
        $provinces = Province::all();
        $cities = City::all();
        return view('user.edit', compact('user', 'provinces', 'cities'));
    }


    public function update(Request $request, User $user)
    {
        $user->name = $request->get('name');
        $user->family = $request->get('family');
        $user->mobile = $request->get('mobile');
        $user->gender = $request->get('gender');
        $user->birth_date = $request->get('birth_date');
        $user->national_code = $request->get('national_code');
        $user->province_id = $request->get('province_id');
        $user->city_id = $request->get('city_id');
        $user->job = $request->get('job');
        $user->username = $request->get('username');
        $user->password = $request->get('password');
        $user->lat = $request->get('lat');
        $user->lan = $request->get('lan');
        $user->update();

        return redirect(route('user.list'));
    }


    public function delete(User $user)
    {
        $user->delete();
        return redirect(route('user.list'));
    }
}
