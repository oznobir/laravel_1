<?php

namespace App\Models;

use Database\Factories\PostFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * 
 *
 * @method static create(string[] $array)
 * @method static latest()
 * @method static max(string $string)
 * @method static get()
 * @method static find($id)
 * @method static findOrFail($id)
 * @property mixed $id
 * @property string $title
 * @property string $preview
 * @property string|null $thumbnail
 * @property string $description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection<int, Chirp> $chirps
 * @property-read int|null $chirps_count
 * @method static PostFactory factory($count = null, $state = [])
 * @method static Builder|Post newModelQuery()
 * @method static Builder|Post newQuery()
 * @method static Builder|Post query()
 * @method static Builder|Post whereCreatedAt($value)
 * @method static Builder|Post whereDescription($value)
 * @method static Builder|Post whereId($value)
 * @method static Builder|Post wherePreview($value)
 * @method static Builder|Post whereThumbnail($value)
 * @method static Builder|Post whereTitle($value)
 * @method static Builder|Post whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'preview',
        'description',
        'thumbnail',
    ];

//    protected $guarded = [];

    protected $casts = [
//        'expired_at' => 'datetime',
    ];

//    /**
//     * @return Attribute
//     */
//    protected function description(): Attribute
//    {
//        $id = self::max('id') + 1;
//
//        return Attribute::make(
//            set: fn(string $value) => 'Пост ' . $id . ': ' . $value
//        );
//    }
    /**
     * @return HasMany
     * @uses chirps
     */
    public function chirps(): HasMany
    {
        return $this->hasMany(Chirp::class);
    }
}
