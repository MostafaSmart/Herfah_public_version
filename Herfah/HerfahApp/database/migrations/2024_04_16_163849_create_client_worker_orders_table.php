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
        Schema::create('client_worker_orders', function (Blueprint $table) {
            $table->id();
            $table->date('startDate')->nullable();
            $table->string('status');
            $table->string('testimonial')->nullable();//تعليق عن العمل
            $table->decimal('Amount')->nullable();
            $table->integer('Num_Days')->nullable();
            $table->foreignId('client_id')->constrained('clients');
            $table->foreignId('worker_id')->constrained('workers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_worker_orders');
    }
};
