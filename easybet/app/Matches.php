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

    public function team1(){
        return $this->belongsTo(Teams::class,'teams_id');
    }

    public function team2(){
        return $this->belongsTo(Teams::class,'teams2_id');
    }


    public function bets(){
        return $this->belongsToMany(User::class, 'bets', 'match_id', 'user_id');
    }

    // public function players1()
    // {
    //     return $this->hasManyThrough(
    //         Players::class,
    //         Teams::class,
    //         'country_id',
    //         'user_id',
    //         'id',
    //         'id'
    //     );
    // }
}
