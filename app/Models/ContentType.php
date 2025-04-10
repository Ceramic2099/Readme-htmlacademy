<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ContentType
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $title
 * @property string $icon_name
 *
 * @property Collection|Post[] $posts
 *
 * @package App\Models
 */
class ContentType extends Model
{
    protected $table = 'content_types';

    protected $fillable = [
        'title',
        'icon_name'
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Возвращаем id в зависимости от типа контента
     */
    public static function getContentTypeId($type)
    {
        return self::all()->where('icon_name', '=', $type)->value('id');
    }
}
