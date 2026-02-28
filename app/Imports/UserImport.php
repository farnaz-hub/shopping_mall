<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;

class UserImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'name'     => $row[0],
            'family'   => $row[1],
            'mobile'   => $row[2],
            'username' => $row[3],
            'password' => bcrypt($row[4]),
        ]);
    }
}
