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
        Schema::create('health_surveillances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('consultation_id')
            ->constrained()
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            $table->string('surveillanceType');
            $table->string('occupation');
            $table->string('hazards');
            $table->string('ecg');
            $table->string('spirometry');
            $table->string('audiometry');
            $table->string('general');
            $table->date('followUp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('health_surveillances');
    }
};
