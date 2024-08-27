<?php

namespace App\Models;

use Database\Factories\NameFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Carbon;


/**
 * 
 *
 * @property mixed $last_name
 * @property mixed $first_name
 * @method static get()
 * @method static create(array $array)
 * @property int $id
 * @property string $type
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read mixed $full_name
 * @method static NameFactory factory($count = null, $state = [])
 * @method static Builder|Name namesOnChar(string $char)
 * @method static Builder|Name namesOnCharP()
 * @method static Builder|Name newModelQuery()
 * @method static Builder|Name newQuery()
 * @method static Builder|Name query()
 * @method static Builder|Name whereCreatedAt($value)
 * @method static Builder|Name whereFirstName($value)
 * @method static Builder|Name whereId($value)
 * @method static Builder|Name whereLastName($value)
 * @method static Builder|Name wherePassword($value)
 * @method static Builder|Name whereRememberToken($value)
 * @method static Builder|Name whereType($value)
 * @method static Builder|Name whereUpdatedAt($value)
 * @mixin Eloquent
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
            ->where($this->fillable[0], 'LIKE', 'R%')
            ->orWhere($this->fillable[1], 'LIKE', 'П%');
    }

    /**
     * @param Builder $query
     * @param string $char

     * @uses scopeNamesOnChar
     */
    public function scopeNamesOnChar(Builder $query, string $char): void
    {
       $query
            ->where($this->fillable[0], 'LIKE', $char . '%')
            ->orWhere($this->fillable[1], 'LIKE', $char . '%');
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
