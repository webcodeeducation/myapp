<?php

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
        // $this->call(UsersTableSeeder::class);
        $this->call('UserTableSeeder');
 
        $this->command->info('User table seeded!');
    }
}



class UserTableSeeder extends Seeder {
 
    public function run()
    {
        //DB::table('users')->delete();
 
        //User::create(['email' => 'foo@bar.com']);
        $this->call([
        //UserSeeder::class,
        //PostSeeder::class,
        //CommentSeeder::class,
        ModuleSeeder::class,
    ]);
    }
 
}