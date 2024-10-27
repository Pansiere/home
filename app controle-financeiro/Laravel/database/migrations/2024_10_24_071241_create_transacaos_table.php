<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('transacoes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->enum('tipo', ['Despesa', 'Receita']);
            $table->decimal('valor', 10, 2);
            $table->string('descricao');
            $table->foreignId('categoria_id')->nullable()->constrained('categorias')->onDelete('set null');
            $table->date('data');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transacoes');
    }
};
