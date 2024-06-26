<?php

declare(strict_types=1);

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AdminSeeder::class,
            UserTableSeeder::class,
            SiteTableSeeder::class,
            ClassificationTableSeeder::class,
            CategoryTableSeeder::class,
        ]);
    }
}
