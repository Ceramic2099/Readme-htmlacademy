<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Post
 * 
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $title
 * @property string $body
 * @property string|null $image
 * @property string|null $video_link
 * @property string|null $link
 * @property int|null $views
 * @property int $user_id
 * @property int $content_type_id
 * 
 * @property ContentType $content_type
 * @property User $user
 * @property Collection|Comment[] $comments
 * @property Collection|Like[] $likes
 * @property Collection|Hashtag[] $hashtags
 *
 * @package App\Models
 */
class Post extends Model
{
	protected $table = 'posts';

	protected $casts = [
		'views' => 'int',
		'user_id' => 'int',
		'content_type_id' => 'int'
	];

	protected $fillable = [
		'title',
		'body',
		'image',
		'video_link',
		'link',
		'views',
		'user_id',
		'content_type_id'
	];

	public function content_type()
	{
		return $this->belongsTo(ContentType::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function comments()
	{
		return $this->hasMany(Comment::class);
	}

	public function likes()
	{
		return $this->hasMany(Like::class);
	}

	public function hashtags()
	{
		return $this->belongsToMany(Hashtag::class, 'post_hashtag')
					->withPivot('id')
					->withTimestamps();
	}
}
