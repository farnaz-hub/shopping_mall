<?php

namespace App\Http\Controllers;

use App\Imports\UserImport;
use App\Jobs\ImportUsersJob;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UserImportController extends Controller
{
    public function show_form()
    {
        return view('importUsers');
    }


    public function import(Request $request)
    {
        $file = $request->file('file');
        $file->move(public_path(), 'file.xlsx');

//        Excel::import(new UserImport(), public_path('file.xlsx'));   //upload without queue
        ImportUsersJob::dispatch(public_path('file.xlsx'));   //upload with queue

        return redirect()->back();
    }
}
