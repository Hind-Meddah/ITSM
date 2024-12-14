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
        Schema::create('marques', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->unsignedBigInteger("type_id");
            $table->foreign("type_id")->references('id')->on("types");
            $table->timestamps();
            $table->unique(["name","type_id"]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marques');
    }
};