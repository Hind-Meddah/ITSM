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
        Schema::create('devices', function (Blueprint $table) {
            $table->id();
            $table->string("label")->nullable();
            $table->string("n_série")->nullable()->unique();
            $table->string("n_inventaire")->nullable();
            $table->integer("ram")->nullable();
            $table->integer("stockage")->nullable();
            $table->unsignedBigInteger("type_id")->nullable();
            $table->foreign("type_id")->references('id')->on("types");
            $table->unsignedBigInteger('classe_id')->nullable();
            $table->foreign("classe_id")->references('id')->on("classes");
            $table->unsignedBigInteger('marque_id')->nullable();
            $table->foreign("marque_id")->references('id')->on("marques");
            $table->unsignedBigInteger('model_id')->nullable();
            $table->foreign("model_id")->references('id')->on("models");
            $table->unsignedBigInteger('cpu_id')->nullable();
            $table->foreign("cpu_id")->references('id')->on("processors");
            $table->unsignedBigInteger('os_id')->nullable();
            $table->foreign("os_id")->references('id')->on("o_s");
            $table->unsignedBigInteger('establishement_id')->nullable();
            $table->foreign("establishement_id")->references('id')->on("establishements");
            $table->boolean("status")->default(0);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devices');
    }
};
