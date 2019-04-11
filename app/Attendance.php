<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = ['user_id', 'att_date', 'att_year', 'attendance'];

    public function employee()
    {
    	return $this->belongsTo(Employee::class, 'user_id', 'id');      
    }
}
