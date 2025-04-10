<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Comment
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $body
 * @property int $user_id
 * @property int $post_id
 *
 * @property Post $post
 * @property User $user
 *
 * @package App\Models
 */
class Comment extends Model
{
    protected $table = 'comments';

    protected $casts = [
        'user_id' => 'int',
        'post_id' => 'int'
    ];

    protected $fillable = [
        'body',
        'user_id',
        'post_id'
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
