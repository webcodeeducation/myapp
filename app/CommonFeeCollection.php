<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommonFeeCollection extends Model
{
    protected $table = 'commonfeecollection';
    protected $fillable = ['Receipt', 'ReceiptReverse', 'Payment','PaymentReverse'];
}
