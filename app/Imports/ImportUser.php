<?php

namespace App\Imports;

use App\Models\Email;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class ImportUser implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Email([
            'name' => $row['name'],
            'email' => $row['email'],
            'status' => '0',
            'date' =>  date("Y/m/d"),
            'group_id' => $row['group_code']
        ]);
    }
}
