<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Players extends Model
{
    use SoftDeletes;
    protected $fillable = ['firstname','lastname','pseudo','age','teams_id'];

    public function teams(){
        return $this->belongsTo(Teams::class);
    }
}
