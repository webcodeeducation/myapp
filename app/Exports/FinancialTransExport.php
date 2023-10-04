<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\FinancialTrans;

class FinancialTransExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return FinancialTrans::select('due','due_reverse','concession','concession_reverse','opening_balance')->get();
    }
}
