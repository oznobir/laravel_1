<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static whereIn(string $string, array $permissions)
 * @method static create(string[] $array)
 * @method static where(string $string, string $string1)
 * @method static get()
 * @property mixed $roles
 * @property mixed $slug
 */
class Permission extends Model
{
    use HasFactory;
}
