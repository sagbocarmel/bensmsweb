<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmsSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sms_schools', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_sms');
            $table->unsignedBigInteger('id_school');
            $table->foreign('id_sms')->on('s_m_s_s')->references('id');
            $table->foreign('id_school')->on('users')->references('id');
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
        Schema::dropIfExists('sms_schools');
    }
}
