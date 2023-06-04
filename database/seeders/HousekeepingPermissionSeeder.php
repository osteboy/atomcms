<?php

namespace Database\Seeders;

use App\Models\WebsiteHousekeepingPermission;
use Illuminate\Database\Seeder;

class HousekeepingPermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            [
                'permission' => 'housekeeping_access',
                'description' => 'Minimum required rank to access the housekeeping',
                'min_rank' => 7,
            ],
            [
                'permission' => 'impersonate',
                'description' => 'Minimum required rank to impersonate another user',
                'min_rank' => 7,
            ],
            [
                'permission' => 'impersonate_anyone',
                'description' => 'Minimum required rank to impersonate anyone (also staff users)',
                'min_rank' => 7,
            ],
            [
                'permission' => 'delete_user',
                'description' => 'Minimum required rank to delete users',
                'min_rank' => 7,
            ],
            [
                'permission' => 'edit_user',
                'description' => 'Minimum required rank to edit users',
                'min_rank' => 7,
            ],
            [
                'permission' => 'ban_user',
                'description' => 'Minimum required rank to ban users',
                'min_rank' => 7,
            ],
        ];

        foreach ($permissions as $permission) {
            WebsiteHousekeepingPermission::firstOrCreate(['permission' => $permission['permission']], [
                'permission' => $permission['permission'],
                'description' => $permission['description'],
                'min_rank' => $permission['min_rank'],
            ]);
        }
    }
}
