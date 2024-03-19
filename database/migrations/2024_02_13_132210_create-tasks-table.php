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
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('uuid')->unique();
            $table->unsignedInteger('user_id')->index('user_index');

            $table->string('title')->unique();
            $table->text('description')->nullable();
            $table->boolean('is_public')->default(false);
            $table->unsignedSmallInteger('priority')->default(1);
            $table->set('status', ['todo', 'in-progress', 'pending', 'review', 'done'])->default('todo');

            $table->unsignedInteger('unit_id')->nullable();
            $table->unsignedInteger('parent_id')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
