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
        Schema::create('laboratories', function (Blueprint $table) {
            $table->id();
            $table->integer('laboratorieable_id')->nullable();
            $table->string('laboratorieable_type')->nullable();
            $table->string('hemoglobin')->nullable();
            $table->string('malariaThick')->nullable();
            $table->string('malariaThin')->nullable();
            $table->string('malariaQuicktest')->nullable();
            $table->string('bloodGlucose')->nullable();
            $table->string('got')->nullable();
            $table->string('gpt')->nullable();
            $table->string('ggt')->nullable();
            $table->string('creatinine')->nullable();
            $table->string('urea')->nullable();
            $table->string('potasiumK')->nullable();
            $table->string('uricAcid')->nullable();
            $table->string('creatinineKinase')->nullable();
            $table->string('troponinT')->nullable();
            $table->string('urineDipstick')->nullable();
            $table->string('urineMicroscopy')->nullable();
            $table->string('stoolMicroscopy')->nullable();
            $table->string('sputumMicroscopy')->nullable();
            $table->string('gammaGt')->nullable();
            $table->string('cholesterol')->nullable();
            $table->integer('total')->nullable();
            $table->string('ldh')->nullable();
            $table->string('ldl')->nullable();
            $table->string('triglyceride')->nullable();
            $table->string('tBilirubine')->nullable();
            $table->string('dBilirubine')->nullable();
            $table->string('iBilirubine')->nullable();
            $table->string('fastingGlucose')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laboratories');
    }
};
