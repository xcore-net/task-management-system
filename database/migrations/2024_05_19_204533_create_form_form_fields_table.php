<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Ramsey\Uuid\Guid\Fields;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('form_form_fields', function (Blueprint $table) {
          
            $table->unsignedInteger('form_id');
            $table->unsignedInteger('field_id');
            $table->foreign('form_id')->references('id')->on('forms')->onDelete('cascade');
            $table->foreign('field_id')->references('id')->on('form_fields')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_form_fields');
        Schema::dropForeign('form_id');
        Schema::dropForeign('field_id');
    }
};
