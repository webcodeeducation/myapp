<?php
namespace App\Imports;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use App\Category;
use App\User;
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

class FinancialTransImport implements ToCollection, WithChunkReading, ShouldQueue,WithStartRow
{
    public function collection(Collection $rows)
    {
        //do your insertion here. //no seprate job required
      
      foreach ($rows as $row)
        {
          /*return new CommonFeeCollection([
            'Receipt'     => $row[6].'@gmail.com',
            'ReceiptReverse'    => $row[6].'@gmail.com',
            'Payment' =>$row[6].'@gmail.com',
            'PaymentReverse' =>$row[6].'@gmail.com',
        ]);*/
          Category::create([
                    'category_name'     => 'name_here',
               ]);
        }
    }

     public function startRow(): int 
    {
         return 6;
    }

    public function batchSize(): int
    {
        return 500;
    }

    public function chunkSize(): int
    {
        return 500;
    }
}


/*namespace App\Imports;

//use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
//use Maatwebsite\Excel\Concerns\WithHeadingRow;
//use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use Maatwebsite\Excel\Concerns\WithStartRow;
//use Hash;
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
    
    public function startRow(): int
    {
        return 6;
    }
    
    public function model(array $row)
    {
        
        //foreach ($rows as $row)
        //{
          //print_r($row);
           $user = CommonFeeCollection::create([
               'Receipt' => 100.2,
               'ReceiptReverse'    => 100.2,
               'Payment' => 100.2,
               'PaymentReverse' => 1245.22,
           ]);
           Customer::create([
               'customer_name' => $row[0],
               'gender' => $row[1],
               'address' => $row[2],
               'city' => $row[3],
               'postal_code' => $row[4],
               'country' => $row[5],
           ]);
           $myString = $row[8];
           $myArray = explode(',', $myString);
           foreach ($myArray as $value) {
               Courses::create([
                    'user_id' => $user->id,
                    'course_name' => $value,
               ]);
           }
      //}
        return new FinancialTrans([
            'due'     => $row[0],
            'due_reverse'    => $row[1],
            'concession' =>$row[2],
            'concession_reverse' =>$row[3],
            'opening_balance' =>$row[4],
        ]);
    }
}*/
