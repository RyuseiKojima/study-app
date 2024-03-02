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
            ['classification_id' => 1, 'name' => 'HTML'],
            ['classification_id' => 1, 'name' => 'CSS'],
            ['classification_id' => 1, 'name' => 'JavaScript'],
            ['classification_id' => 1, 'name' => 'React.js'],
            ['classification_id' => 1, 'name' => 'Vue.js'],
            ['classification_id' => 1, 'name' => 'TypeScript'],
            ['classification_id' => 1, 'name' => 'Angular'],
            ['classification_id' => 2, 'name' => 'Java'],
            ['classification_id' => 2, 'name' => 'PHP'],
            ['classification_id' => 2, 'name' => 'Ruby'],
            ['classification_id' => 2, 'name' => 'Python'],
            ['classification_id' => 2, 'name' => 'GO'],
            ['classification_id' => 2, 'name' => 'Scala'],
            ['classification_id' => 2, 'name' => 'C++'],
            ['classification_id' => 2, 'name' => 'C#'],
            ['classification_id' => 2, 'name' => 'Ruby'],
            ['classification_id' => 2, 'name' => 'Node.js'],
            ['classification_id' => 2, 'name' => 'Laraval'],
            ['classification_id' => 2, 'name' => 'CakePHP'],
            ['classification_id' => 2, 'name' => 'Django'],
            ['classification_id' => 2, 'name' => 'Flask'],
            ['classification_id' => 2, 'name' => 'Rust'],
            ['classification_id' => 2, 'name' => 'GraphQL'],
            ['classification_id' => 3, 'name' => 'Kotlin'],
            ['classification_id' => 4, 'name' => 'Swift'],
            ['classification_id' => 4, 'name' => 'Flutter'],
            ['classification_id' => 4, 'name' => 'React Native'],
            ['classification_id' => 5, 'name' => 'AWS'],
            ['classification_id' => 5, 'name' => 'Google Cloud Platform'],
            ['classification_id' => 5, 'name' => 'Kubernetes'],
            ['classification_id' => 5, 'name' => 'Firebase'],
            ['classification_id' => 5, 'name' => 'Docker'],
            ['classification_id' => 5, 'name' => 'Azure'],
            ['classification_id' => 5, 'name' => 'オンプレミス'],
            ['classification_id' => 5, 'name' => 'MongoDB'],
            ['classification_id' => 6, 'name' => 'R'],
            ['classification_id' => 6, 'name' => '機械学習'],
            ['classification_id' => 6, 'name' => 'julia'],
            ['classification_id' => 6, 'name' => 'TensorFlow'],
            ['classification_id' => 7, 'name' => '3D(Unity)'],
            ['classification_id' => 7, 'name' => '2D(Unity)'],
            ['classification_id' => 7, 'name' => 'AR'],
            ['classification_id' => 7, 'name' => 'VR'],
            ['classification_id' => 8, 'name' => 'Ethereum'],
            ['classification_id' => 8, 'name' => 'Bitcoin'],
            ['classification_id' => 8, 'name' => 'Corda'],
            ['classification_id' => 8, 'name' => 'Quorum'],
            ['classification_id' => 9, 'name' => 'Figma'],
            ['classification_id' => 9, 'name' => 'Miro'],
            ['classification_id' => 9, 'name' => 'Sketch'],
            ['classification_id' => 9, 'name' => 'UI/UX'],
        ]);
    }
}
