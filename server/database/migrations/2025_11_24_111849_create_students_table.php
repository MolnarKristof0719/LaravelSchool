<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('studentName');
            $table->foreignId('schoolclassId')->constrained('schoolclasses');
            $table->tinyInteger('sex');
            $table->string('postalCode')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->string('birthPlace')->nullable();
            $table->date('birthDate')->nullable();
            $table->string('idNumber')->nullable();
            $table->decimal('gpa', 2, 1)->nullable();
            $table->decimal('scholarship', 10, 0)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
