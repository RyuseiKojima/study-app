<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; //←追加

class SiteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sites')->insert([
            'name' => 'Qiita',
            'name' => 'Zenn',
            'name' => 'Stack Overflow',
            'name' => 'GitHub',
            'name' => 'YouTube',
            'name' => 'その他',
        ]);
    }
}
