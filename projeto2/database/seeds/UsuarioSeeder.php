<?php

use Illuminate\Database\Seeder;
use App\Http\Models\User;

class UsuarioSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'ADMIN',
            'password' => bcrypt('ADMIN'),
            'email' => 'admin@gmail.com'
        ]);
    }
}