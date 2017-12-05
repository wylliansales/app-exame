<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable=[
      'company_id', 'start_time', 'stop_time', 'description', 'date'
    ];

    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }

    public function doctor()
    {
        return $this->belongsTo('App\Models\Doctor');
    }
}
