<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Matches extends Model
{
    use SoftDeletes;

    protected $fillable = ['name','games_id'];

    public function games(){
        return $this->belongsTo(Game::class);
    }
}
