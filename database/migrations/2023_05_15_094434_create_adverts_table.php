<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('adverts', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('surname');
            $table->string('last_name');
            $table->string('gender');
            $table->integer('avg_age');
            $table->string('last_seen');
            $table->date('lost_date');
            $table->string('picture');
            $table->text('description');
            $table->integer('reward_offered');
            $table->integer('rel_contact');
            $table->string('relation');
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adverts');
    }
};
