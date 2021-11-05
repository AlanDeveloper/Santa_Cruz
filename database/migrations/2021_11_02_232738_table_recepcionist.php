<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableRecepcionist extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recepcionist', function (Blueprint $table) {
            $table->primary('cpf');

            $table->string('cpf', 14)->unique();
            $table->string('name', 100);
            $table->string('email', 100)->unique();
            $table->string('address', 100);
            $table->string('telephone', 14);
            $table->string('experience', 500);
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
        Schema::dropIfExists('recepcionist');
    }
}
