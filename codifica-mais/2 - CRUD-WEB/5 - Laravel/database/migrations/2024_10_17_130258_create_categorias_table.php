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
    public function up(): void
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->string('categoria')->unique();
            $table->timestamps();
        });

        DB::table('categorias')->insert([
            [
                'categoria' => 'Eletrônicos',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'categoria' => 'Eletrodomésticos',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'categoria' => 'Móveis',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'categoria' => 'Decoração',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'categoria' => 'Vestuário',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'categoria' => 'Outros',
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
        Schema::dropIfExists('categorias');
    }
};
