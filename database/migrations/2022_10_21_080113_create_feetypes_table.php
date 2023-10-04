<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeetypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feetypes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('fee_category');
            $table->integer('f_name');
            $table->integer('Collection_id');
            $table->integer('br_id');
            $table->integer('Seq_id');
            $table->integer('Fee_type_ledger');
            $table->integer('Fee_headtype');
            $table->enum('inactive', [0, 1])->default(0);
            $table->enum('isRefundable', [0, 1])->default(0);
            $table->enum('isScholarship', [0, 1])->default(0);
            $table->integer('sequenceNo');
            $table->string('feeTypeName');
            $table->string('feeTypeNameTally');
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
        Schema::dropIfExists('feetypes');
    }
}
