<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable=[
        'personal_image',
        'rate',
        'user_id'
    ];
    public function worker(){
        return $this->belongsToMany(Worker::class,"client_worker_orders");
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function orders(){
        return $this->hasMany(ClientWorkerOrder::class,'client_id');
    }
}
