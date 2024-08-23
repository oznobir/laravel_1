<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @method static where(string $string, string $string1, string $string2)
 * @method static whereIn(string $string, int[] $array)
 * @method static find(int $int)
 * @method static findOrFail($id)
 * @method static firstOrFail($id)
 * @method static orderBy(string $string, string $string1)
 * @method static orderByDesc(string $string)
 * @method static create(string[] $array)
 * @method static namesOnCharP()
 * @method static namesOnChar(string $string)
 * @method static get()
 * @property mixed|string $first_name
 * @property mixed|string $last_name
 */
class Name extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'type',
        'password',
    ];
//    protected $guarded = [];

    /**
     * @param Builder $query
     * @return Builder
     * @uses scopeNamesOnCharP
     */
    public function scopeNamesOnCharP(Builder $query): Builder
    {
        return $query
            ->where('first_name', 'LIKE', 'R%')
            ->orWhere('last_name', 'LIKE', 'П%');
    }

    /**
     * @param Builder $query
     * @param string $char

     * @uses scopeNamesOnChar
     */
    public function scopeNamesOnChar(Builder $query, string $char): void
    {
       $query
            ->where('first_name', 'LIKE', $char . '%')
            ->orWhere('last_name', 'LIKE', $char . '%');
    }

    /**
     * @return Attribute
     * @uses fullName
     */
    protected function fullName(): Attribute
    {
        return new Attribute(
            get: fn() => $this->last_name . ' ' . mb_substr($this->first_name, 0, 1) . '.'
        );
    }
}
