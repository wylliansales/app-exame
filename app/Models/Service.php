<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{

    protected $fillable = [
        'doctor_id', 'employee_id', 'company_id', 'observation', 'exam_date', 'start_time',
    ];

    public function doctor()
    {
        return $this->belongsTo('App\Models\Doctor');
    }

    public function employee()
    {
        return $this->belongsTo('App\Models\Employee');
    }

    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }

    public function services_has_exams()
    {
        return $this->hasMany('App\Models\Services_has_Exams');
    }

}
