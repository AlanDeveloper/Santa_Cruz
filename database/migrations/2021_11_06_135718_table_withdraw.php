<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableWithdraw extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('withdraw', function (Blueprint $table) {
            $table->primary(["cpfNurse", "cpfPac", "idMedicament", "date"]);

            $table->integer('idMedicament');
            $table->integer('amount');
            $table->datetime('date');
            $table->string('cpfNurse', 14);
            $table->string('cpfPac', 14);

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
        Schema::dropIfExists('withdraw');
    }
}
