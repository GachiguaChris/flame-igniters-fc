<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('jersey_number')->nullable();
            $table->enum('position', ['Goalkeeper', 'Defender', 'Midfielder', 'Forward']);
            $table->text('bio')->nullable();
            $table->string('photo')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->integer('appearances')->default(0);
            $table->integer('goals')->default(0);
            $table->integer('assists')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('players');
    }
};
