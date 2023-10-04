<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommonfeecollectionheadwiseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commonfeecollectionheadwise', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('moduleId');
            $table->integer('receiptId');
            $table->integer('brid');
            $table->integer('headId');
            $table->integer('headType');
            $table->string('headName');
            $table->float('amount');
            $table->float('amountPay');
            $table->integer('ddNo');
            $table->date('ddDate');
            $table->string('ddBank')->nullabel();
            $table->string('clientBank')->nullabel();
            $table->string('displayReceiptNo')->nullabel();
            $table->string('entryMode');
            $table->string('challanRefId');
            $table->string('adjustRefId');
            $table->string('dueRefId');
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
        Schema::dropIfExists('commonfeecollectionheadwise');
    }
}
