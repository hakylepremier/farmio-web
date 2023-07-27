<?php

use App\Models\InsuranceCompany;
use App\Models\Shop;
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
        Schema::create('investments', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image')->nullable();
            $table->float('amount', 10, 2);
            $table->integer('roi');
            $table->string('location');
            $table->integer('investor_number');
            $table->foreignIdFor(Shop::class)->index();
            $table->integer('cycle');
            $table->string('investment_type');
            $table->foreignIdFor(InsuranceCompany::class)->index();
            $table->date('maturity_date');
            $table->date('closing_date');
            $table->boolean('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('investments');
    }
};
