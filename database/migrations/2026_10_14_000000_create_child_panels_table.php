<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('child_panels', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('domain')->unique();
            $table->string('panel_name');
            $table->string('logo')->nullable();
            $table->decimal('markup_percentage', 5, 2)->default(0.00);
            $table->string('api_key')->unique();
            $table->enum('status', ['active', 'suspended', 'pending'])->default('active');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('child_panels');
    }
};