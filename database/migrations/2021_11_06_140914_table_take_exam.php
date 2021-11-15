<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableTakeExam extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('takeExam', function (Blueprint $table) {
            $table->primary(['idExam','cpfNurse','idAppointment']);

            $table->datetime('date');
            $table->integer('idAppointment');
            $table->integer('idExam');
            $table->text('result')->nullable();
            $table->string('cpfNurse', 14);

            $table->foreign('cpfNurse')->references('cpf')->on('nurse')->onDelete('cascade');
            $table->foreign('idExam')->references('id')->on('exam')->onDelete('cascade');
            $table->foreign('idAppointment')->references('id')->on('appointment')->onDelete('cascade');

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
        Schema::dropIfExists('takeExam');
    }
}
