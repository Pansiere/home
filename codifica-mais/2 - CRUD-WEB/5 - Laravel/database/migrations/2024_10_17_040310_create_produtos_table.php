<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('sku')->unique();
            $table->decimal('valor', 8, 2);
            $table->integer('quantidade');
            $table->unsignedBigInteger('unidade_medida_id');
            $table->unsignedBigInteger('categoria_id');
            $table->timestamps();

            $table->foreign('unidade_medida_id')->references('id')->on('unidades_medida')->onDelete('cascade');
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
