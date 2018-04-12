<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\User::class,1)->create([
           'email' => 'jorgitodf06@gmail.com'
        ]);

        factory(\App\Models\User::class,1)->create([
            'email' => 'admin@gmail.com'
        ]);
    }
}
