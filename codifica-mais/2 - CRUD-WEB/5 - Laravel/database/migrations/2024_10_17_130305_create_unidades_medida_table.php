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
    public function up()
    {
        Schema::create('unidades_medidas', function (Blueprint $table) {
            $table->id();
            $table->string('unidade_medida')->unique();
            $table->timestamps();
        });

        DB::table('unidades_medidas')->insert([
            ['unidade_medida' => 'Un'],
            ['unidade_medida' => 'Kg'],
            ['unidade_medida' => 'g'],
            ['unidade_medida' => 'L'],
            ['unidade_medida' => 'mm'],
            ['unidade_medida' => 'cm'],
            ['unidade_medida' => 'm'],
            ['unidade_medida' => 'm²'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unidades_medida');
    }
};
