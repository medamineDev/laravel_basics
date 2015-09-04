<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use \App\Article as Article;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);

        $article = Article::create(array(
            'title'         => 'test_seed',
            'price'         => '12.000',
            'created_at' => "2015-08-17 04:00:00",
            'updated_at' => "2015-08-17 04:00:00"
        ));


        Model::reguard();
    }
}
