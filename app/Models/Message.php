<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Message
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $body
 * @property int $message_id
 * @property int $user_id
 *
 * @property User $user
 *
 * @package App\Models
 */
class Message extends Model
{
    protected $table = 'messages';

    protected $casts = [
        'message_id' => 'int',
        'user_id' => 'int'
    ];

    protected $fillable = [
        'body',
        'message_id',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
