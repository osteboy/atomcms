<?php

namespace App\Services;

use App\Models\WebsiteHousekeepingPermission;
use App\Models\WebsitePermission;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class HousekeepingPermissionsService
{
    public ?Collection $permissions;

    public function __construct()
    {
        $this->permissions = WebsiteHousekeepingPermission::all()->pluck('min_rank', 'permission');
    }

    public function getOrDefault(string $permissionName, bool $default = false): bool
    {
        if (Auth::guest()) {
            return $default;
        }

        if (! array_key_exists($permissionName, $this->permissions->toArray())) {
            return $default;
        }

        return Auth::user()->rank >= (int) $this->permissions->get($permissionName);
    }
}
