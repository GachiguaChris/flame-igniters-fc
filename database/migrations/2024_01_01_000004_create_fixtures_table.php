<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('fixtures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('competition_id')->nullable()->constrained()->nullOnDelete();
            $table->string('opponent');
            $table->date('match_date');
            $table->time('kickoff_time')->nullable();
            $table->string('venue')->nullable();
            $table->enum('home_away', ['Home', 'Away'])->default('Home');
            $table->enum('status', ['Upcoming', 'Completed', 'Postponed', 'Cancelled'])->default('Upcoming');
            $table->integer('our_score')->nullable();
            $table->integer('opponent_score')->nullable();
            $table->text('match_report')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fixtures');
    }
};
