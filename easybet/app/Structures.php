<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Structures extends Model
{
    use SoftDeletes;
    protected $fillable = ['name'] ;
    
    public function teams()
    {
        return $this->hasMany(Teams::class);
    }
}
