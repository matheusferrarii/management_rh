<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employee';
    protected $fillable = ['name','email', 'department_id'];
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

}


