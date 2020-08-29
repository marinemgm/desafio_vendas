<?php

use App\User;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   User::firstOrCreate(
            [
                'email' => 'admin@gmail.com',
            ],
            [

                'name' => 'Administrador',
                'password' => bcrypt('12345678')
            ]
        
        );
    }
}
