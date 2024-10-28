<?php

use Hyperf\Database\Schema\Schema;
use Hyperf\Database\Schema\Blueprint;
use Hyperf\Database\Migrations\Migration;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->date('data_nascimento');
            $table->timestamps();
//            $table->unsignedBigInteger('especie_id');
//            $table->foreign('especie_id')
//                ->references('id')
//                ->on('especie')
//                ->onDelete('cascade');

//            $table->foreign('especies_id')

        });

    }

    public function down(): void
    {
        Schema::dropIfExists('pets');
    }
};
