<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static create(string[] $array)
 * @method static orderBy(string[] $array)
 * @method static latest()
 * @method static max(string $string)
 * @method static get()
 * @method static find($id)
 * @method static findOrFail($id)
 * @property mixed $id
 */
class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'expired_at' => 'datetime',
    ];

    /**
     * @return Attribute
     */
    public function description(): Attribute
    {
        $id = self::max('id') + 1;

        return Attribute::make(
            set: fn(string $value) => 'Пост ' . $id . ': ' . $value
        );
    }
    /**
     * @return HasMany
     * @uses chirps
     */
    public function chirps(): HasMany
    {
        return $this->hasMany(Chirp::class);
    }
}
