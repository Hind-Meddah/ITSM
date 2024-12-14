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
        Schema::create('accessoires', function (Blueprint $table) {
            $table->id();
            $table->string("label")->nullable();
            $table->unsignedBigInteger("type_id");
            $table->foreign("type_id")->references('id')->on("types");
            $table->unsignedBigInteger('classe_id');
            $table->foreign("classe_id")->references('id')->on("classes");
            $table->unsignedBigInteger('marque_id');
            $table->foreign("marque_id")->references('id')->on("marques");
            $table->unsignedBigInteger('parent_ref');
            $table->foreign("parent_ref")->references('id')->on("devices");
            $table->unsignedBigInteger('model_id');
            $table->foreign("model_id")->references('id')->on("models");
            $table->string("n_série");
            $table->string("n_inventaire");
            $table->boolean("status")->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accessoires');
    }
};



