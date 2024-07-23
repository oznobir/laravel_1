<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, string $string1, string $string2)
 * @method static whereIn(string $string, int[] $array)
 * @method static find(int $int)
 */
class Name extends Model
{
    use HasFactory;
}
