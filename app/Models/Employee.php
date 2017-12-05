<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Employee extends Model
{

    protected $fillable = [
        'name', 'function', 'date_of_birth',
    ];

    public function services()
    {
        return $this->hasMany('App\Models\Service');
    }

}
