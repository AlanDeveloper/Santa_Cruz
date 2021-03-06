<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableMedicament extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicament', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name', 100)->unique();
            $table->integer('amount');
            $table->string('description', 500);
            $table->string('cpfNurse', 14)->nullable();

            $table->foreign('cpfNurse')->references('cpf')->on('nurse')->onDelete('set null');

            $table->timestamps();
        });

        DB::statement('ALTER TABLE medicament ADD CONSTRAINT check_medicament CHECK (amount >= 0);');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicament');
    }
}
