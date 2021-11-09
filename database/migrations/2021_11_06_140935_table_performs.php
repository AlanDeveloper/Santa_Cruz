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
            $table->primary(['cpfMed','idConsultation']);

            $table->string('cpfMed',14);
            $table->integer('idConsultation');
            $table->text('diagnosis');
            $table->datetime('date');

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
