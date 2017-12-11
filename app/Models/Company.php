<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Company extends Model
{

    protected $fillable = [
        'name', 'cnpj', 'address','phone',
    ];

    public function services()
    {
        return $this->hasMany('App\Models\Service');
    }
}
