<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TablePerforms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('performs', function (Blueprint $table) {
            $table->primary(['cpfMed','idAppointment']);

            $table->string('cpfMed',14);
            $table->integer('idAppointment');
            $table->text('diagnosis');
            $table->datetime('date');

            $table->foreign('cpfMed')->references('cpf')->on('medic');
            $table->foreign('idAppointment')->references('id')->on('appointment');

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
        Schema::dropIfExists('performs');
    }
}
