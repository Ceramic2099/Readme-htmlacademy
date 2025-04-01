<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * 
 * @property int $id
 * @property string $name
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $avatar
 * @property int|null $subscriber_id
 * @property int|null $message_id
 * 
 * @property User|null $user
 * @property Collection|Comment[] $comments
 * @property Collection|Like[] $likes
 * @property Collection|Message[] $messages
 * @property Collection|Post[] $posts
 * @property Collection|Subscribe[] $subscribes
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class User extends Model
{
	protected $table = 'users';

	protected $casts = [
		'email_verified_at' => 'datetime',
		'subscriber_id' => 'int',
		'message_id' => 'int'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'name',
		'email',
		'email_verified_at',
		'password',
		'remember_token',
		'avatar',
		'subscriber_id',
		'message_id'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'subscriber_id');
	}

	public function comments()
	{
		return $this->hasMany(Comment::class);
	}

	public function likes()
	{
		return $this->hasMany(Like::class);
	}

	public function messages()
	{
		return $this->hasMany(Message::class);
	}

	public function posts()
	{
		return $this->hasMany(Post::class);
	}

	public function subscribes()
	{
		return $this->hasMany(Subscribe::class);
	}

	public function users()
	{
		return $this->hasMany(User::class, 'subscriber_id');
	}
}
