<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuyersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buyers', function (Blueprint $table) {
            $table->id();
            $table->string('buyer_id');//done
            $table->string('buyer_name');//done
            $table->string('buyer_address');//done
            $table->string('buyer_website')->nullable();//done
            $table->string('buyer_telephone');//done
            $table->string('buyer_email')->nullable();//buyer
            $table->string('buyer_nid');//buyer
            $table->string('buyer_logo')->nullable()->default('logo.png');//done
            $table->string('br_name')->nullable();
            $table->string('br_email')->nullable();
            $table->string('br_phone')->nullable();
            $table->string('br_image')->nullable()->default('defaultphoto.png');
            $table->string('buyer_type');
            $table->string('trade_license')->nullable();
            $table->date('expire_date');
            $table->string('tagline');//done
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
        Schema::dropIfExists('buyers');
    }
}
