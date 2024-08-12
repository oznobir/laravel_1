<?php

namespace App\Models;

use App\Events\ChirpCreated;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $user
 * @property mixed $message
 * @property mixed $user_id
 * @method static create(mixed $validated)
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
