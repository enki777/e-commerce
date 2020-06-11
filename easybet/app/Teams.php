<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teams extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'structures_id','teams_id'];

    public function structures()
    {
        return $this->belongsTo(Structures::class);
    }

    public function players(){
        return $this->hasMany(Players::class);
    }

    public function matches(){
        return $this->hasMany(Matches::class);
    }
}
