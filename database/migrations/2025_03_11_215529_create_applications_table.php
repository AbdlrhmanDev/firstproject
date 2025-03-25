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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');  // المتقدم
            $table->foreignId('job_id')->constrained()->onDelete('cascade');   // الوظيفة
            $table->foreignId('resume_id')->nullable()->constrained()->onDelete('set null'); // اختياري
            $table->string('status')->default('Pending');
            $table->text('message')->nullable();  // رسالة مع التقديم

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
