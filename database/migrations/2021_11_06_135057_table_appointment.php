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
            $table->primary('id');

            $table->integer('id');
            $table->datetime('date');
            $table->string('cpfRec', 14);
            $table->string('cpfPac', 14);

            $table->foreign('cpfPac')->references('cpf')->on('patient');
            $table->foreign('cpfRec')->references('cpf')->on('recepcionist');
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
