<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableReceptionist extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receptionist', function (Blueprint $table) {
            $table->primary('cpf');

            $table->string('cpf', 14);
            $table->string('name', 100);
            $table->string('email', 100)->unique();
            $table->string('address', 100);
            $table->string('telephone', 14);
            $table->boolean('experience');
            $table->string('knowledge', 500);
            
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
        Schema::dropIfExists('receptionist');
    }
}
