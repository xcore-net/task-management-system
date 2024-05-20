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
        Schema::create('assignees_task_types', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('task_type_id');
            $table->foreign('task_type_id')->references('id')->on('task_types');

            $table->unsignedBigInteger('assignee_id');
            $table->foreign('assignee_id')->references('id')->on('assignees');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignees_task_types');
    }
};
