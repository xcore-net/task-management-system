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
        Schema::create('task_type_assignes', function (Blueprint $table) {

            $table->unsignedInteger('assigne_id');
            $table->unsignedInteger('task_type_id');
            $table->foreign('assigne_id')->references('id')->on('assignes')->onDelete('cascade');
            $table->foreign('task_type_id')->references('id')->on('task_types')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_type_assignes');
        Schema::dropForeign('task_type_id');
        Schema::dropForeign('assigne_id');
    }
};
