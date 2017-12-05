<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Services_has_Exams extends Model
{

    protected $fillable = [
        'service_id', 'exam_id',
    ];

    protected $table = 'services_has_exams';

    public function service()
    {
        return $this->belongsTo('App\Models\Service');
    }

    public function exam()
    {
        return $this->belongsTo('App\Models\Exam');
    }

}
