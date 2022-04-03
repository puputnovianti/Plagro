<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdealProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ideal_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('factor_id')->unsigned()->nullable();
            $table->foreign('factor_id')->references('id')->on('factors')->onDelete('cascade');
            $table->integer('criteria_id')->unsigned()->nullable();
            $table->foreign('criteria_id')->references('id')->on('criterias')->onDelete('cascade');
            $table->integer('profile_id')->unsigned()->nullable();
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
        Schema::dropIfExists('ideal_profiles');
    }
}
