<?php

namespace Database\Seeders;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();
     User::Insert([
         ['name' => 'Gafar', 'email' => '12345@mail.com', 'password' => Hash::make(123456), 'role' => 'admin', 'created_at' => $now, 'updated_at' => $now],
     ]);
    }
}
