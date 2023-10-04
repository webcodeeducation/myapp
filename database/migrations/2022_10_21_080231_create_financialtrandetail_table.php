<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinancialtrandetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financialtrandetail', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('financialTransId');
            $table->integer('moduleId');
            $table->integer('amount');
            $table->integer('headId');
            $table->enum('crdr', ['C', 'D'])->default('C');
            $table->integer('tranRefId');
            $table->integer('oldTranId');
            $table->enum('isTaxable', [0,1])->default(0);
            $table->float('total');
            $table->timestamps();
            //$table->foreign('financialTransId')->references('id')->on('financial_tran');
        });

        Schema::table('financialtrandetail', function($table) {
       //$table->foreign('role_id')->references('id')->on('users');
            //$table->foreign('user_id')->references('id')->on('users');
            //$table->foreign('lab_id')->references('id')->on('users');
            $table->foreign('financialTransId')->references('id')->on('financial_tran');
            //$table->foreign('test_id')->references('id')->on('tests');
               });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('financialtrandetail');
    }
}
