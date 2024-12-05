<?php

use Hyperf\Database\Schema\Schema;
use Hyperf\Database\Schema\Blueprint;
use Hyperf\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('especies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('descricao');
            $table->string('nome');
            $table->timestamps();
        });
    }
    public function down(): void
    {
    }
};
