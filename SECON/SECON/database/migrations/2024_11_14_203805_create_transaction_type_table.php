<?php

use Illuminate\Support\Facades\{DB, Schema};
use Illuminate\Database\{Migrations\Migration, Schema\Blueprint};

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaction_type', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        DB::table('transaction_type')->insert([
            ['name' => 'Receita'],
            ['name' => 'Despesa']
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_type');
    }
};
