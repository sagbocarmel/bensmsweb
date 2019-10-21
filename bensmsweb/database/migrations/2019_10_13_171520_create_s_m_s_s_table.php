<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSMSSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_m_s_s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sms_sender',15);
            $table->string('sms_receiver',15);
            $table->string('student_matricule',20);
            $table->string('student_level', 50);
            $table->text('sms_value');
            $table->date('sms_send_date');
            $table->time('sms_send_time');
            $table->unsignedInteger('nbr_page_sms')->nullable(true);
            $table->string('sms_price')->nullable(true);
            $table->unsignedInteger('sms_state');
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
        Schema::dropIfExists('s_m_s_s');
    }
}
