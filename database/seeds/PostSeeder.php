<?php

use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1;$i<=10;$i++){
        DB::table('posts')->insert([
            'title' => Str::random(100),
            'body' => Str::random(1000)
        ]);
    }
    }
}
