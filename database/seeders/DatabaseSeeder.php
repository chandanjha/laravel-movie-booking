<?php

namespace Database\Seeders;

use App\Models\Genre;
use App\Models\User;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    //basic seeds
    public function run()
    {
        
        //calling seed for cities and states
        $this->call([
            StatesSeeder::class,
            CitiesSeeder::class
        ]);
        

        //seed for users 
        $user1 = User::create([
            'name' => 'yatin',
            'email' => 'yatin6215@gmail.com',
            'password' => bcrypt('123456789'),
            'user_role' => 'admin',
            'phone' => '9958684179',
            'created_at' => now()
        ]);

        $user2 = User::create([
            'name' => 'pratyush',
            'email' => 'pratyush@gmail.com',
            'password' => bcrypt('123456789'),
            'user_role' => 'admin',
            'phone' => '9999999999',
            'created_at' => now()
        ]);


        //seedd for genres
        $action = Genre::create([
            'name' => 'action'
        ]);

        $adventure = Genre::create([
            'name' => 'adventure'
        ]);

        $animation = Genre::create([
            'name' => 'animation'
        ]);

        $biography = Genre::create([
            'name' => 'biography'
        ]);

        $comedy = Genre::create([
            'name' => 'comedy'
        ]);

        $thriller = Genre::create([
            'name' => 'thriller'
        ]);

        $sport = Genre::create([
            'name' => 'sport'
        ]);

        $family = Genre::create([
            'name' => 'family'
        ]);

        $romantic = Genre::create([
            'name' => 'romantic'
        ]);

        $horror = Genre::create([
            'name' => 'horror'
        ]);

        
    }
    
}
