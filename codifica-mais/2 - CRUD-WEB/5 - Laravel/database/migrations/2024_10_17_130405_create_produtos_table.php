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

        DB::table('produtos')->insert([
            [
                'imagem' => 'imagem/teste',
                'nome' => 'Smartphone',
                'sku' => 'SP001',
                'valor' => 1999.99,
                'quantidade' => 10,
                'unidade_medida_id' => 1,
                'categoria_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'imagem' => 'imagem/teste',
                'nome' => 'Geladeira',
                'sku' => 'GLD001',
                'valor' => 3599.90,
                'quantidade' => 5,
                'unidade_medida_id' => 1,
                'categoria_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'imagem' => 'imagem/teste',
                'nome' => 'Cadeira de Escritório',
                'sku' => 'CAD001',
                'valor' => 499.90,
                'quantidade' => 25,
                'unidade_medida_id' => 1,
                'categoria_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'imagem' => 'imagem/teste',
                'nome' => 'Camiseta',
                'sku' => 'CAM001',
                'valor' => 49.90,
                'quantidade' => 100,
                'unidade_medida_id' => 1,
                'categoria_id' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'imagem' => 'imagem/teste',
                'nome' => 'Televisor 55"',
                'sku' => 'TV001',
                'valor' => 2499.00,
                'quantidade' => 12,
                'unidade_medida_id' => 1,
                'categoria_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
