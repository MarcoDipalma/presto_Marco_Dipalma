<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    protected $fillable=[
        'title',
        'description',
        'price',
        'category_id',
        'user_id',
    ]; 

    public function user():BelongsTo{
        return $this->hasMany(User::class);
    }

    public function category():BelongsTo{
        return $this->hasMany(Category::class);
    }

}
