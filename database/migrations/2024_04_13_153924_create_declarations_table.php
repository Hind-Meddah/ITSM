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
        Schema::create('declarations', function (Blueprint $table) {
            $table->id();
            $table->integer("type_Anci_Dmd")->default(0);
            $table->integer("urgence")->default(0);
            $table->unsignedBigInteger('user_id');
            $table->foreign("user_id")->references('id')->on("users")->onDelete("cascade");
            $table->unsignedBigInteger('classe_id');
            $table->foreign("classe_id")->references('id')->on("classes");
            $table->unsignedBigInteger('device_id')->nullable();
            $table->foreign("device_id")->references('id')->on("devices");
            $table->unsignedBigInteger('accessoire_id')->nullable();
            $table->foreign("accessoire_id")->references('id')->on("accessoires");
            $table->text("description_issue");
            $table->string("Technom")->nullable();
            $table->string("Techprenom")->nullable();
            $table->text("description_solution")->nullable();
            $table->date("date_accept_or_refus")->nullable();
            $table->date("date_confirmation")->nullable();
            $table->date("date_Terminer")->nullable();
            $table->integer("status")->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('declarations');
    }
};
