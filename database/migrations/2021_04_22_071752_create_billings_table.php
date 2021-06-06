<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->float('bill_amount',16);
            // $table->date('due_date')->nullable();
            $table->enum('payment_status',['paid','unpaid','partials'])->default('partials');
            // $table->date('payment_date');
            $table->float('payment_amount',16);
            $table->string('payment_type');
            $table->date('check_issue_date');
            $table->string('check_number');
            $table->string('bank_name');
            $table->string('check_photo');
            $table->unsignedBigInteger('user_id');
            $table->string('buyer_id')->nullable();
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
        Schema::dropIfExists('billings');
    }
}
