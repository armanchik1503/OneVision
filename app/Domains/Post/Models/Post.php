<?php

declare(strict_types=1);

namespace App\Domains\Post\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class Post
 *
 * @property int                 $id
 * @property int                 $user_id
 * @property int                 $dummy_post_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 */
final class Post extends Model
{
    /**
     * @var string
     */
    protected $table = 'posts';

    /**
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'dummy_post_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function author(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
