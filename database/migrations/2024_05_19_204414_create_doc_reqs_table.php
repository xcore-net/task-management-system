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
        Schema::create('doc_reqs', function (Blueprint $table) {
          
            $table->unsignedInteger('client_id');
            $table->unsignedInteger('doc_type_id');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('doc_type_id')->references('id')->on('doc_types')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doc_reqs');
        Schema::dropForeign('client_id');
        Schema::dropForeign('doc_type_id');
    }
};
