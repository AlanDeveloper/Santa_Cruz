<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableMedic extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medic', function (Blueprint $table) {
            $table->primary('cpf');

            $table->string('cpf', 14)->unique();
            $table->string('name', 100);
            $table->string('email', 100)->unique();
            $table->string('crm', 10);
            $table->string('speciality', 50);
            $table->string('telephone', 14);
            $table->string('address');
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
        Schema::dropIfExists('medic');
    }
}
