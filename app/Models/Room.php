<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Room
 *
 * @property int $id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property int $price
 * @property string $introduction
 * @property string $adress
 * @property string $image
 * @property string $post_user
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\RoomFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Room newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Room newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Room query()
 * @method static \Illuminate\Database\Eloquent\Builder|Room whereAdress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Room whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Room whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Room whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Room whereIntroduction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Room whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Room wherePostUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Room wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Room whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Room whereUserId($value)
 * @mixin \Eloquent
 */
class Room extends Model
{
  use HasFactory;
  protected $fillable = ['name', 'price', 'introduction', 'adress', 'image', 'user_id', 'post_user'];
  
  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
