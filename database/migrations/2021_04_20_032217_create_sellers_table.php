<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sellers', function (Blueprint $table) {
            $table->id();
            $table->string('seller_id');//
            $table->string('seller_name');//
            $table->string('seller_address');//
            $table->string('seller_website');//
            $table->string('seller_telephone');//
            $table->string('seller_email');//
            $table->string('seller_passport')->nullable();//
            $table->string('seller_nid');//
            $table->string('sr_name');//
            $table->string('sr_email');//
            $table->string('sr_phone');//
            $table->string('sr_image');
            $table->unsignedBigInteger('user_id');
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
        Schema::dropIfExists('sellers');
    }
}
