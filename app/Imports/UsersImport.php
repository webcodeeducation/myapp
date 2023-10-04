<?php

namespace App\Imports;

use App\User;
use App\Branches;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;

class UsersImport implements ToCollection,WithStartRow, WithBatchInserts
{
	public function startRow(): int
    {
        return 6;
    }
        public function batchSize(): int
    {
        return 10;
    }

    public function collection(Collection $rows)
    {
    	ini_set('max_execution_time', 1800);
        foreach ($rows as $row) 
        {
            /*User::create([
                'name' => $row[0],
                'email' => $row[1],
                'password' => $row[2],
            ]);*/
            Branches::create([
                'br_name' => $row[8],
            ]);
        }
    }
}
