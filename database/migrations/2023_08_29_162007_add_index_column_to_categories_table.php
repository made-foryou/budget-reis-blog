<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->integer('index')
                ->after('is_visible');
        });

        if (config('app.env') !== 'testing') {
            // Set default sort order (just copy ID to sort order)
            DB::statement('UPDATE categories SET `categories`.`index` = `categories`.`id`');
        }
    }

    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('index');
        });
    }
};
