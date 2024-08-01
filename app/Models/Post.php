<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(string[] $array)
 * @method static orderBy(string[] $array)
 * @method static latest()
 * @method static max(string $string)
 * @method static get()
 * @method static find($id)
 */
class Post extends Model
{
    use HasFactory;

    protected $guarded = [];
//    protected array $dates = ['created_at', 'updated_at', 'expired_at']; // удалено
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
}
