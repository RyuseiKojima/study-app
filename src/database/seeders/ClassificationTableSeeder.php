<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; //←追加

class ClassificationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classifications')->insert([
            ['id' => 1, 'name' => 'Webフロント'],
            ['id' => 2, 'name' => 'バックエンド'],
            ['id' => 3, 'name' => 'Android'],
            ['id' => 4, 'name' => 'iOS'],
            ['id' => 5, 'name' => 'インフラ'],
            ['id' => 6, 'name' => 'データサイエンス'],
            ['id' => 7, 'name' => 'ゲーム/XR'],
            ['id' => 8, 'name' => 'ブロックチェーン'],
            ['id' => 9, 'name' => 'UI/UX'],
        ]);
    }
}
