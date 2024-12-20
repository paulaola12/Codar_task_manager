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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('task_name');
            $table->string('project_name')->nullable();
            $table->string('priority');
            $table->string('intern')->nullable();
            $table->string('supervisor')->nullable();
            $table->string('start_date');
            $table->string('end_date');
            $table->string('status');
            $table->string('is_approved')->default(false);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
