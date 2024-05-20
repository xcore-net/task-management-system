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
        Schema::create('uploaded_files', function (Blueprint $table) {
            $table->string('name');
            $table->unsignedInteger('size');
            $table->unsignedInteger('form_id');
            $table->unsignedInteger('client_id');
            $table->foreign(['form_id'])->references('form_id')->on('filled_forms')->onDelete('cascade');
            $table->foreign(['client_id'])->references('client_id')->on('filled_forms')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('uploaded_files');
        Schema::dropForeign(['form_id', 'client_id']);
    }
};
