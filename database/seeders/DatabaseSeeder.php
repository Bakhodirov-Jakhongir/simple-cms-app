<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\User;
use \App\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      // factory('App\User', 10)->create()->each(function($user){
      //   $user->posts()->save(factory('App\Post')->make());
        User::factory(10)->create();
    }      
      
}
