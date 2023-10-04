<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinancialtranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financial_tran', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('moduleId');
            $table->integer('tranId');
            $table->integer('admnNo');
            $table->float('amount');
            $table->float('crdr');
            $table->enum('accountType', [0,1,2]);
            $table->float('acadYear');
            $table->enum('TypeofConcession',[0,1,2])->default(0);
            $table->float('isChalan');
            $table->float('chalanNo');
            $table->float('chalanGenBy');
            $table->float('tranType');
            $table->float('tranOnBank');
            $table->float('tranRefNo');
            $table->float('tranRefDate');
            $table->enum('inactive', [0,1])->default(0);
            $table->float('paymentRecBy');
            $table->enum('isPaymentRec', [0,1])->default(0);
            $table->enum('isPaymentAuthorized', [0,1])->default(0);
            $table->enum('payAuthorizedBy', [0,1])->default(0);
            $table->enum('isReconciled', [0,1])->default(0);
            $table->string('Remark');
            $table->integer('memberClassId');
            $table->integer('feeCategory');
            $table->enum('memberStatus',[0,1])->default(0);
            $table->enum('erpSync',[0,1])->default(0);
            $table->enum('entryMode',[0,1])->default(0);
            $table->enum('adjustFrom',[0,1])->default(0);
            $table->integer('adjustReceiptNo');
            $table->float('adjustAmount');
            $table->integer('installmentNo');
            $table->string('currency')->nullable();
            $table->integer('createdBy');
            $table->integer('isIndividualAlter');
            $table->boolean('status')->default(0);
            $table->integer('miscdueId');
            $table->integer('displayInvoiceNo');
            $table->integer('voucherNo');
            $table->integer('invoiceAgainstAdmNo')->nullabel();
            $table->float('invoiceAgainstInvoice');
            $table->enum('customerCurrency', ['INR','USD'])->default('INR');
            $table->float('customerCurrencyRate');
            $table->float('bseAmount');
            $table->float('dueRefNo');
            $table->string('file_name')->nullable();
            $table->integer('hostelId');
            $table->date('hostelJoinDate');
            $table->integer('routeId');
            $table->date('trpJoindate');
            $table->integer('brid');
            $table->enum('manuallyCreated',[0,1])->default(0);
            $table->string('session');
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
        Schema::dropIfExists('financial_tran');
    }
}
