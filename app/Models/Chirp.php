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
 */
class Chirp extends Model
{
    use HasFactory;

    protected $fillable = [
        'message',
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
}
