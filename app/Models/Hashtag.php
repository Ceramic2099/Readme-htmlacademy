<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Hashtag
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $title
 *
 * @property Collection|Post[] $posts
 *
 * @package App\Models
 */
class Hashtag extends Model
{
    protected $table = 'hashtags';

    protected $fillable = [
        'title'
    ];

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_hashtag')
            ->withPivot('id')
            ->withTimestamps();
    }
}
