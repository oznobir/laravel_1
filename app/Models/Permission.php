<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @method static whereIn(string $string, array $permissions)
 * @method static create(string[] $array)
 * @method static where(string $string, string $string1)
 * @method static get()
 */
class Permission extends Model
{
    use HasFactory;
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class,'roles_permissions');
    }
}
