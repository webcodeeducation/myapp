<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommonfeecollectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commonfeecollection', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('Receipt');
            $table->float('ReceiptReverse');
            $table->float('Payment');
            $table->float('PaymentReverse');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commonfeecollection');
    }
}
