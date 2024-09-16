<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfoli extends Model
{
    use HasFactory;

    protected $fillable=['About_Project','Images','worker_id'];


    public function worker(){
        return $this->belongsTo(Worker::class);
    }
}
