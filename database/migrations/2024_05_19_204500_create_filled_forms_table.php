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
        Schema::create('filled_forms', function (Blueprint $table) {
            
            $table->unsignedInteger('form_id');
            $table->unsignedInteger('client_id');
            $table->foreign('form_id')->references('id')->on('forms')->onDelete('cascade');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('filled_forms');
        Schema::dropForeign('form_id');
        Schema::dropForeign('client_id');
    }
};
