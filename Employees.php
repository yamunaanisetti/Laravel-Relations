<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
   protected $table = 'employees';
   protected $fillable = ['id','Employee_id',
    'name', 'gender', 'phone','address'];
     protected $id = '';
     protected $Employee_id = '';
     protected $name = '';
     protected $gender = '';
     protected $phone = '';
     protected $address='';
     protected $primaryKey ='id';

     public function salaries(){
        return $this->hasMany('App\Salary','id','Employee_id');
    	} 
}
