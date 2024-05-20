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

            // $table->foreignIdFor(Task::class, 'parent_id')->nullable()->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('clients');

            $table->unsignedBigInteger('document_request_id');
            $table->foreign('document_request_id')->references('id')->on('document_requests');
            
            $table->unsignedBigInteger('task_type_id');
            $table->foreign('task_type_id')->references('id')->on('task_types');
            
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
