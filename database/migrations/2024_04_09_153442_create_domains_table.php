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
        Schema::create('domains', function (Blueprint $table) {
            $table->id();
            $table->string("name")->unique();
            $table->string("description");
            $table->string("country");
            $table->string("url");
            $table->foreignId("user_id")->constrained();
            $table->text('social')->nullable();
            $table->string("photo_path");
            $table->text("constraind")->nullable();
            $table->enum("language",['arabic' ,"english" , "french" ,"spanish" ,"hindi" , "latin" ,"chinese" , "armenian" , "russian"]);
            $table->enum("type" ,["sport" , "food" , "education" , "policy" , "medicine" , "general"]);
            $table->enum("domain" ,["com" , "net" , "org" , "edu" , "gov" , "mil" , "int"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('domains');
    }
};
