<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    public function course(){
        return $this->belongsto(Course::class);
    }
}
