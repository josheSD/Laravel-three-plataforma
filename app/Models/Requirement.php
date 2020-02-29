<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    public function course(){
        return $this->belongsTo(Course::class);
    }
}
