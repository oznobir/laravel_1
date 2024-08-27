<?php

namespace App\Models;

use App\Events\ChirpCreated;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * 
 *
 * @property mixed $user
 * @property mixed $message
 * @property mixed $user_id
 * @method static create(mixed $validated)
 * @property int $id
 * @property int $post_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Post $post
 * @method static Builder|Chirp newModelQuery()
 * @method static Builder|Chirp newQuery()
 * @method static Builder|Chirp query()
 * @method static Builder|Chirp whereCreatedAt($value)
 * @method static Builder|Chirp whereId($value)
 * @method static Builder|Chirp whereMessage($value)
 * @method static Builder|Chirp wherePostId($value)
 * @method static Builder|Chirp whereUpdatedAt($value)
 * @method static Builder|Chirp whereUserId($value)
 * @mixin \Eloquent
 */
class Chirp extends Model
{
    use HasFactory;

    protected $fillable = [
        'message',
        'user_id',
        'post_id',
    ];
    protected $dispatchesEvents = [

        'created' => ChirpCreated::class,

    ];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    /**
     * @return BelongsTo
     */
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}
