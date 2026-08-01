<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('status')->default('planned');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->uuid('owner_id');
            $table->timestamps();

            $table->foreign('owner_id')->references('id')->on('users')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
