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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id(); // Primary Key (BIGINT UNSIGNED)
            $table->string('title'); // Job Title
            $table->text('description'); // Job Description
            $table->decimal('salary', 10, 2); // Salary (Decimal Format)
            $table->boolean('featured')->default(false);
            $table->string('logo'); // Logo
            $table->foreignId('company_id')->constrained('employers')->onDelete('cascade'); // Foreign Key to Employers
            $table->timestamps(); // Created & Updated At
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
