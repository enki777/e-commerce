<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
        'name', 'image',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function matches(){
        return $this->belongsToMany(Matches::class);
    }
}
