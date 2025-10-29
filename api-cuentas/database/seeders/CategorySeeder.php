<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();

        if (!$user) {
            $this->command->warn('No existen los usuarios. Corre el UserSeeder.');
            return;
        }
        foreach (range(1, 5) as $i) {
            Category::create([
                'name' => 'Category ' . $i,
                'type' => $i % 2 === 0 ? 'income' : 'expense',
                'user_id' => $user->id,
            ]);
        }

        $this->command->info('Categorias creadas.');
    }
}
