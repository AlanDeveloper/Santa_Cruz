<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableAppointment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment', function (Blueprint $table) {

            $table->increments('id');
            $table->datetime('date');
            $table->string('cpfRec', 14)->nullable();
            $table->string('cpfPac', 14)->nullable();

            $table->foreign('cpfPac')->references('cpf')->on('patient')->onDelete('set null');
            $table->foreign('cpfRec')->references('cpf')->on('receptionist')->onDelete('set null');
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
        Schema::dropIfExists('appointment');
    }
}
