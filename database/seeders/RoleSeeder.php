<?php

namespace Database\Seeders;

use App\Models\Right;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class RoleSeeder extends Seeder
{
    const ROLES = [
        ['title' => 'Пользователь'],
        ['title' => 'Администратор'],
    ];

    const ROLE_RIGHTS = [
        'Пользователь' => [Right::READ],
        'Администратор' => [Right::READ, Right::EDIT],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        foreach (self::ROLES as $role) {
            Role::updateOrCreate(
                ['title' => $role['title']],
                $role
            )->rights()->sync(self::getRights($role['title']));
        }
    }

    protected function getRights(string $role): Collection
    {
        return Right::all()
            ->whereIn('code', self::ROLE_RIGHTS[$role])
            ->pluck('id');
    }
}
