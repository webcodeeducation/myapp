<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeecategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feecategory', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('feecategory');
            $table->string('description');
            $table->string('date_created');
            $table->string('user_created');
            $table->boolean('active')->default(1);
            $table->integer('fee_code');
            $table->integer('tr_id');
            $table->integer('userid');
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
        Schema::dropIfExists('feecategory');
    }
}
