<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    //
    public function questions(){
        return $this->belongsToMany(Question::class);
    }
}
