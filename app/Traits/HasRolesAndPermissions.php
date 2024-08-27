<?php

namespace App\Traits;

use App\Models\Permission;
use App\Models\Role;

/**
 * @method belongsToMany(string $class, string $string)
 */
trait HasRolesAndPermissions
{
    /**
     * @return mixed
     */
    public function roles(): mixed
    {
        return $this->belongsToMany(Role::class, 'names_roles');
    }

    /**
     * @return mixed
     */
    public function permissions(): mixed
    {
        return $this->belongsToMany(Permission::class, 'names_permissions');
    }

    /**
     * @param mixed ...$roles
     * @return bool
     */
    public function hasRole(...$roles): bool
    {
        foreach ($roles as $role) {
            if ($this->roles->contains('slug', $role)) {
                return true;
            }
        }
        return false;
    }

    /**
     * @param $permission
     * @return bool
     */
    public function hasPermission($permission): bool
    {
        return (bool)$this->permissions->where('slug', $permission)->count();
    }

    /**
     * @param $permission
     * @return bool
     */
    public function hasPermissionTo($permission): bool
    {
//        return $this->hasPermission($permission);
        return $this->hasPermissionThroughRole($permission)
            || $this->hasPermission($permission->slug);
    }

    /**
     * @param $permission
     * @return bool
     */
    public function hasPermissionThroughRole($permission): bool
    {
        foreach ($permission->roles as $role) {
            if ($this->roles->contains($role)) {
                return true;
            }
        }
        return false;
    }

    /**
     * @param array $permissions
     * @return mixed
     */
    public function getAllPermissions(array $permissions): mixed
    {
        return Permission::whereIn('slug', $permissions)->get();
    }

    /**
     * @param ...$permissions
     * @return $this
     */
    public function givePermissionsTo(...$permissions): static
    {
        $permissions = $this->getAllPermissions($permissions);
        if ($permissions === null) {
            return $this;
        }
        $this->permissions()->saveMany($permissions);
        return $this;
    }

    /**
     * @param ...$permissions
     * @return $this
     */
    public function deletePermissions(...$permissions): static
    {
        $permissions = $this->getAllPermissions($permissions);
        $this->permissions()->detach($permissions);
        return $this;
    }

    /**
     * @param ...$permissions
     * @return static
     */
    public function refreshPermissions(...$permissions): static
    {
        $this->permissions()->detach();
        return $this->givePermissionsTo($permissions);
    }
}
