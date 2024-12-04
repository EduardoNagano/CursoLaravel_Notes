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
        Schema::create('users', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('username', 50)->nullable();
            $table->string('password', 200)->nullable();
            $table->dateTime('last_login')->nullable();
            $table->timestamps(); // cria o 'created_at' e 'updated_at'
            $table->softDeletes(); // cria o 'deleted_at'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
