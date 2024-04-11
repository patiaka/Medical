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
            $table->integer('laboratorieable_id');
            $table->string('laboratorieable_type');
            $table->string('hemoglobin');
            $table->string('malariaThick');
            $table->string('malariaThin');
            $table->string('malariaQuicktest');
            $table->string('bloodGlucose');
            $table->string('got');
            $table->string('gpt');
            $table->string('ggt');
            $table->string('creatinine');
            $table->string('urea');
            $table->string('potasiumK');
            $table->string('uricAcid');
            $table->string('creatinineKinase');
            $table->string('troponinT');
            $table->string('urineDipstick');
            $table->string('urineMicroscopy');
            $table->string('stoolMicroscopy');
            $table->string('sputumMicroscopy');
            $table->string('gammaGt');
            $table->string('cholesterol');
            $table->integer('total');
            $table->string('ldh');
            $table->string('ldl');
            $table->string('triglyceride');
            $table->string('tBilirubine');
            $table->string('dBilirubine');
            $table->string('iBilirubine');
            $table->string('fastingGlucose');
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
