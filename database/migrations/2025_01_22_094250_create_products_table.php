<?php

use App\Models\Admin;
use App\Models\Brand;
use App\Models\Gender;
use App\Models\Category;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Admin::class);
            $table->foreignIdFOr(Category::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFOr(Brand::class)->constrained()->cascadeOnDelete();
            $table ->string('name');
            $table->string('description');
            $table->foreignIdFOr(Gender::class);
            $table->float('price');
            $table->unsignedBigInteger('size');
            $table->integer('stock');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};