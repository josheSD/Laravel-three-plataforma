<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    public function course(){
        return $this->hasOne(Course::class);
    }
}
