<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRetailerProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retailer_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('retailer_id')->unsigned();
            $table->foreign('retailer_id')->references('id')->on('retailers')->onDelete('cascade');
            $table->integer('criteria_id')->unsigned();
            $table->foreign('criteria_id')->references('id')->on('criterias')->onDelete('cascade');
            $table->integer('profile_id')->unsigned();
            $table->foreign('profile_id')->references('id')->on('profiles')->onDelete('cascade');
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
        Schema::dropIfExists('retailer_profiles');
    }
}
