<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
    ];

    public function games()
    {
        return $this->belongsToMany(Game::class);
    }

    public function matches(){
        return $this->hasManyThrough(Matches::class, Game::class,'category_id','games_id','id','id');
    }
}
