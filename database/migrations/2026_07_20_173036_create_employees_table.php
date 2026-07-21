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
        Schema::create('employees', function (Blueprint $table) {

            $table->id();
            // Link to the master authentication table
            $table->foreignId('user_id')->unique()->constrained()->onDelete('cascade');

            // Corporate Details
            $table->string('employee_id_number')->unique(); // Custom company code (e.g., EMP-2026-001)
            $table->string('department');
            $table->string('job_title');

            // Personal Details
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone_number')->nullable();

            // Status & Lifecycle
            $table->date('hire_date');
            $table->enum('status', ['active', 'on_leave', 'terminated'])->default('active');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
