<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntrymodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrymode', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Entrymode_name');
            $table->enum('crdr', ['C','D'])->default('D');
            $table->integer('entrymodeno')->default(0);
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
        Schema::dropIfExists('entrymode');
    }
}
