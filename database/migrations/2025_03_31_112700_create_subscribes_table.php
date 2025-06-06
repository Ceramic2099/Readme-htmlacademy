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
        Schema::create('subscribes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignIdFor(\App\Models\User::class, 'subscriber_id')->constrained()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\User::class, 'user_id')->constrained()->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscribes');
    }
};
