<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    protected $fillable = ['imagem', 'nome', 'sku', 'valor', 'quantidade', 'unidade_medida_id', 'categoria_id'];

    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('imagem');
            $table->string('nome');
            $table->string('sku')->unique();
            $table->decimal('valor', 8, 2);
            $table->integer('quantidade');
            $table->unsignedBigInteger('unidade_medida_id');
            $table->unsignedBigInteger('categoria_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('unidade_medida_id')->references('id')->on('unidades_medidas')->onDelete('cascade');
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
