<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable=[
      'name', 'description', 'price'
    ];

    public function services()
    {
        return $this->hasMany('App\Models\Services_has_Exams');
    }
}
