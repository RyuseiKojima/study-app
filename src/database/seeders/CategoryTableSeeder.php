<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; //←追加

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'HTML',
            'name' => 'CSS',
            'name' => 'JavaScript',
            'name' => 'React.js',
            'name' => 'Vue.js',
            'name' => 'TypeScript',
            'name' => 'Angular',
            'name' => 'Java',
            'name' => 'PHP',
            'name' => 'Ruby',
            'name' => 'Python',
            'name' => 'GO',
            'name' => 'Scala',
            'name' => 'C++',
            'name' => 'SQL',
            'name' => 'C#',
            'name' => 'Ruby',
            'name' => 'Node.js',
            'name' => 'Laraval',
            'name' => 'CakePHP',
            'name' => 'Django',
            'name' => 'Flask',
            'name' => 'Rust',
            'name' => 'GraphQL',
            'name' => 'Kotlin',
            'name' => 'Swift',
            'name' => 'Flutter',
            'name' => 'React Native',
            'name' => 'AWS',
            'name' => 'Google Cloud Platform',
            'name' => 'Kubernetes',
            'name' => 'Firebase',
            'name' => 'Docker',
            'name' => 'Azure',
            'name' => 'オンプレミス',
            'name' => 'Airflow',
            'name' => 'MongoDB',
            'name' => 'オンプレミス',
        ]);
    }
}
