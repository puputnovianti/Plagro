<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRetailerDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retailer_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('retailer_id')->unsigned();
            $table->foreign('retailer_id')->references('id')->on('retailers')->onDelete('cascade');
            $table->integer('factor_id');
            $table->string('criteria_name');
            $table->string('ideal_profile_name');
            $table->integer('ideal_profile_score');
            $table->string('retailer_profile_name');
            $table->integer('retailer_profile_score');
            $table->integer('gap');
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
        Schema::dropIfExists('retailer_details');
    }
}
