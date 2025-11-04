<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;
    public function run(): void
    {
        //User::factory()->create([
           // 'name' => 'Jennysita',
           // 'email' => 'jennysita@gmail.com',
        //]);
        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(AccountSeeder::class);
        $this->call(TransactionSeeder::class);

    }
}
