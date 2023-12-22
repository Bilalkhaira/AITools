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
        Schema::create('tools', function (Blueprint $table) {
            $table->id();
            $table->integer('tool_categories_id');
            $table->string('title');
            $table->longText('description')->nullable();
            $table->longText('use_case1')->nullable();
            $table->longText('use_case2')->nullable();
            $table->longText('use_case3')->nullable();
            $table->string('category')->nullable();
            $table->string('website_link')->nullable();
            $table->string('price')->nullable();
            $table->string('thumbnail')->nullable();
            $table->longText('tags')->nullable();
            $table->string('status')->default('Deactivate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tools');
    }
};
