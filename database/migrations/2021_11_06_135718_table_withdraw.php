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

            $table->foreign('cpfNurse')->references('cpf')->on('nurse')->onDelete('cascade');
            $table->foreign('cpfPac')->references('cpf')->on('patient')->onDelete('cascade');

            $table->timestamps();
        });

        DB::statement('ALTER TABLE withdraw ADD CONSTRAINT check_withdraw CHECK (amount > 0);');
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
