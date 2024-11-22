<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static find(string $id)
 * @property mixed $name
 * @property int|mixed|string|null $user_id
 */
class Category extends Model
{
    protected $table = 'categories';
}
