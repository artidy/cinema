<?php

namespace Database\Seeders;

use App\Models\Right;
use Illuminate\Database\Seeder;

class RightSeeder extends Seeder
{
    const RIGHTS = [
        ['title' => 'Пользователь', 'code' => 'user'],
        ['title' => 'Модератор', 'code' => 'moderator'],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        foreach (self::RIGHTS as $right) {
            Right::create($right);
        }
    }
}
