<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable=[
      'name', 'crm'
    ];

    public function services()
    {
        return $this->hasMany('App\Models\Service');
    }

    public function schedules()
    {
        return $this->hasMany('App\Models\Schedule');
    }
}
