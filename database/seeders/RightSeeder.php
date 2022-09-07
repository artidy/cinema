<?php

namespace Database\Seeders;

use App\Models\Right;
use Illuminate\Database\Seeder;

class RightSeeder extends Seeder
{
    const RIGHTS = [
        ['title' => 'Просматривать', 'code' => Right::READ],
        ['title' => 'Редактировать', 'code' => Right::EDIT],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        foreach (self::RIGHTS as $right) {
            Right::updateOrCreate(
                ['code' => $right['code']],
                $right
            );
        }
    }
}
