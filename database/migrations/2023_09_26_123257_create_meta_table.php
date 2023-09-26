<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('meta', function (Blueprint $table) {
            $table->id();

            $table->string('describable_type');
            $table->unsignedBigInteger('describable_id');

            $table->string('title');
            $table->text('description');

            $table->string('social_title')->nullable();
            $table->text('social_description')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('meta');
    }
};
