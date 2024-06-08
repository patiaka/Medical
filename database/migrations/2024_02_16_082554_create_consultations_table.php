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
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('injurie_id')
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('diagnose_id')
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('employee_id')
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->string('staffType');
            $table->string('referral');
            $table->longText('history');
            $table->integer('bp');
            $table->integer('pulse');
            $table->integer('temperature');
            $table->longtext('observation');
            $table->longtext('comments');
            $table->string('malaria');
            $table->integer('daysOff');
            // $table->string('diagnosispec');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultations');
    }
};
