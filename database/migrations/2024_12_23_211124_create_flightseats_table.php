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
        Schema::create('flightseats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('flight_id')->constrained()->cascadeOnDelete();
            $table->string('row');
            $table->string('column');
            $table->enum('class_type', ['Economy', 'Bussiness']);
            $table->boolean('is_available')->default(false);
            $table->SoftDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flightseats');
    }
};
