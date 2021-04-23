<?php

namespace App\Imports;

use App\Models\Record;
use Maatwebsite\Excel\Concerns\ToModel;

class RecordImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Record([
          'firstname'  => $row['firstname'],
         'lastname'   => $row['lastname'],
         'email'   => $row['email'],
         'phone'    => $row['phone']
        ]);
    }
}
