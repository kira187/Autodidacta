<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Misael Aguas Jimenez',
            'email' => 'missael133@gmail.com',
            'password' => bcrypt(123)
        ]);

        User::factory(99)->create();
    }
}
