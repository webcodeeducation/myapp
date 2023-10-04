<?php

namespace App\Imports;

//use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
//use Maatwebsite\Excel\Concerns\WithHeadingRow;
//use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Hash;
use App\Branches;
use App\FeeCategories;
use App\FeeCollectionTypes;
use App\FeeTypes;
use App\EntryMode;
use App\Module;
use App\FinancialTrans;
use App\FinancialTranDetails;
use App\CommonFeeCollection;
use App\CommonFeeCollectionHeadwise;

class FinancialTransImport implements ToModel,WithStartRow
{
    
/**
     * @return int
     */
    public function startRow(): int
    {
        return 7;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        

        //echo $row[1][1];
        return new FinancialTrans([
            'due'     => $row[0],
            'due_reverse'    => $row[1],
            'concession' =>$row[2],
            'concession_reverse' =>$row[3],
            'opening_balance' =>$row[4],
        ]);
    }
}
