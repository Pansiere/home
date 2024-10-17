<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->string('categoria')->unique();
            $table->timestamps();
        });

        DB::table('categorias')->insert([
            ['categoria' => 'Eletrônicos'],
            ['categoria' => 'Eletrodomésticos'],
            ['categoria' => 'Móveis'],
            ['categoria' => 'Decoração'],
            ['categoria' => 'Vestuário'],
            ['categoria' => 'Outros'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categorias');
    }
};
