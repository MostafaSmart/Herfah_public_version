<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $fillable=[
        'D_Name',
        'D_About',
        'NumOfWorker',
        'imgcover',
    ];
    public function worker(){
        return $this->hasMany(Worker::class,'department_id');
    }
}
