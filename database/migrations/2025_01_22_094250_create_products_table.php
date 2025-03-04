<?php

use App\Models\Admin;
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
            $table ->string('name');
            $table->string('description');
            $table->string('brand');
            $table->string('type');
            $table->string('department');
            $table->string('scent_note');
            $table->float('price');
            $table->unsignedBigInteger('size');
            $table->string('category');
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