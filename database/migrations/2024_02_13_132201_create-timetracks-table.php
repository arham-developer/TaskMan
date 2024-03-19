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
        Schema::create('timetracks', function (Blueprint $table) {
            $table->increments('id');
            
            $table->unsignedInteger('user_id')->index('user_index');
            $table->unsignedInteger('task_id')->index('task_index');

            $table->datetime('start')->nullable();
            $table->datetime('end')->nullable();

            $table->unique(['task_id', 'start'], 'unique_tracks');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('timetracks');
    }
};
