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
            $table->string("name")->unique()->nullable($value = false);
            $table->enum("language",['Arabic' ,"English" , "French" ,"Spanish" ,"Hindi" , "Latin" ,"Chinese" , "Armenian" , "Russian"]);
            $table->string("description");
            $table->enum("type" ,["Sport" , "Food" , "Education" , "Policy" , "Medicine" , "General"]);
            $table->string("country");
            $table->enum("domain" ,["com" , "net" , "org" , "edu" , "gov" , "mil" , "int"]);
            $table->string("url");
            $table->foreignId("user_id")->constrained();
            $table->string('social')->nullable();
            $table->string("photo_path");
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
