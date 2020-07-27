<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
    // Ralation 1 - N
    public function answers(){
        return $this->hasMany(Answer::class);
    }

    // N -N
    public function exams(){
        return $this->belongsToMany(Exam::class);
    }
}
