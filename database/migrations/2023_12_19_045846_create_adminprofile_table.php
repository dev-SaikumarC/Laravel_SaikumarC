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
        Schema::create('adminprofile', function (Blueprint $table) {
            $table->id();
            $table->integer('admin_id');
            $table->string('profile_image');
            $table->string('company');
            $table->string('role');
            $table->string('country');
            $table->string('mobile');
            $table->string('gender');
            $table->string('experience');
            $table->string('dob');
            $table->timestamps('');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adminprofile');
    }
};
