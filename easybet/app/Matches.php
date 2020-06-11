<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Matches extends Model
{
    use SoftDeletes;

    protected $fillable = ['name','games_id','teams_id','teams2_id'];

    public function games(){
        return $this->belongsTo(Game::class);
    }

    public function users(){
        return $this->belongsToMany(User::class, 'matches_user', 'matches_id','users_id')->as('bet')->withPivot('created_at','updated_at','outcome');
    }

    public function teams(){
        return $this->belongsToMany(Teams::class,'matches_teams','matches_id','teams_id');
    }

    public function teams2(){
        return $this->belongsToMany(Teams::class,'matches_teams','matches_id','teams2_id');
    }
}
