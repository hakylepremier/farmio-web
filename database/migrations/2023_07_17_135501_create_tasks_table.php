<?php

use App\Models\Frequency;
use App\Models\TaskCategory;
use App\Models\TaskPriority;
use App\Models\User;
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
            $table->id();
            $table->text('title');
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->foreignIdFor(Frequency::class);
            $table->foreignIdFor(TaskCategory::class);
            $table->foreignIdFor(TaskPriority::class);
            $table->boolean('status');
            $table->foreignIdFor(User::class);
            $table->timestamps();
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
