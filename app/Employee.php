<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['emoplyee_no','name','designation_id','department','company','salary','joining_date','termination_date'];

    public function designation()
    {
        return $this->hasOne(Designation::class, 'id', 'designation_id');
    }
}
