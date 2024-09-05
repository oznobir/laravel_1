<?php

namespace App\Traits;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;


trait HasRolesAndPermissions
{
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    public function permissions(): HasManyThrough
    {
        return $this->hasManyThrough(Permission::class,Role::class);
    }

    /**
     * @param string|Role $role
     * @return Model|mixed
     */
    public function assignRole(string|Role $role): mixed
    {
        if (is_string($role)) {
            $role = Role::where('slug', $role)->firstOrFail();
        }

        return $this->roles()->save($role);
    }

    /**
     * @param string $role
     * @return bool
     */
    public function hasRole(string $role): bool
    {
        return $this->roles()->where('slug', $role)->exists();
    }

    /**
     * @param string $permission
     * @return bool
     */
    public function hasPermission(string $permission): bool
    {
        return $this->getAllPermissions()->contains($permission);
    }

    /**
     * @return mixed
     */
    public function getAllPermissions(): mixed
    {
        return $this->roles()->with('permissions')->get()
            ->pluck('permissions.*.slug')->flatten()->unique();
    }
}
