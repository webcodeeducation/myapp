<?php

use Illuminate\Database\Seeder;
//use App\Models\Transaction;
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

class TransactionTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Branches::truncate();
        $csvData = fopen(base_path('database/csv/transaction_report.csv'), 'r');
        $transRow = true;
        while (($data = fgetcsv($csvData, 555, ',')) !== false) {
            if (!$transRow) {
                Branches::create([
                    'br_name' => $data['7'],
                ]);
            }
            $transRow = false;
        }
        fclose($csvData);
    }
}
