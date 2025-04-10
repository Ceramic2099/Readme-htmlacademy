<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Subscribe
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $subscriber_id
 * @property int $user_id
 *
 * @property User $user
 *
 * @package App\Models
 */
class Subscribe extends Model
{
    protected $table = 'subscribes';

    protected $casts = [
        'subscriber_id' => 'int',
        'user_id' => 'int'
    ];

    protected $fillable = [
        'subscriber_id',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
