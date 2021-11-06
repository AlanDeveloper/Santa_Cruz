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
            $table->primary(['idExam','cpfNurse','idConsultation']);

            $table->datetime('date');
            $table->integer('idConsultation');
            $table->integer('idExam');
            $table->text('result');
            $table->string('cpfNurse', 14);

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
