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
    public function up()
    {
        Schema::create('unidades_medidas', function (Blueprint $table) {
            $table->id();
            $table->string('unidade_medida')->unique();
            $table->timestamps();
        });

        DB::table('unidades_medidas')->insert([
            [
                'unidade_medida' => 'Un',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'unidade_medida' => 'Kg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'unidade_medida' => 'g',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'unidade_medida' => 'L',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'unidade_medida' => 'mm',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'unidade_medida' => 'cm',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'unidade_medida' => 'm',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'unidade_medida' => 'm²',
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
        Schema::dropIfExists('unidades_medida');
    }
};
