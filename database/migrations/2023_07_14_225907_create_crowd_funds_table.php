<?php

use App\Models\Shop;
use App\Models\CrowdCategory;
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
        Schema::create('crowd_funds', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('image')->nullable();
            $table->float('amount', 10, 2);
            $table->foreignIdFor(Shop::class)->index();
            $table->date('period');
            $table->string('location');
            $table->boolean('active');
            $table->foreignIdFor(CrowdCategory::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crowd_funds');
    }
};
