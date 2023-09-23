<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->foreignId('page_id')
                ->nullable()
                ->after('id')
                ->references('id')
                ->on('pages')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropForeign('pages_page_id_foreign');
            $table->dropColumn('page_id');
        });
    }
};
