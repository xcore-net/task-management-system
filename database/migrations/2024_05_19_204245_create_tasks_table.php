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
            
            $table->string('title');
            $table->text('desc')->nullable();
            $table->enum('status', ['complete', 'inprogress', 'missed_due_to_time', 'dismissed', 'draft']);
            $table->unsignedInteger('p_key')->nullable();
            $table->date('due_date');

            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('task_type_id');
            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('task_type_id')->references('id')->on('task_type_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
        Schema::dropForeign('client_id');
        Schema::dropForeign('doc_type_id');
    }
};
