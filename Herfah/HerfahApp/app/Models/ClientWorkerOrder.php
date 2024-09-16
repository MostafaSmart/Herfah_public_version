<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientWorkerOrder extends Model
{
    use HasFactory;
    protected $fillable=['startDate','status','testimonial','Amount','Num_Days','worker_id','client_id'];
}
