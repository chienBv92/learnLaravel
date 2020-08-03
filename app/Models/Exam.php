<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = [
       'id',  'name'
    ];
    //
    public function questions(){
        return $this->belongsToMany(Question::class);
    }
}
