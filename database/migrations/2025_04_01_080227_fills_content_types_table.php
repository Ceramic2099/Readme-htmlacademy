<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('content_types')->insert([
            ['title' => 'Текст', 'icon_name' => 'text'],
            ['title' => 'Цитата', 'icon_name' => 'quote'],
            ['title' => 'Картинка', 'icon_name' => 'photo'],
            ['title' => 'Видео', 'icon_name' => 'video'],
            ['title' => 'Ссылка', 'icon_name' => 'link'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
