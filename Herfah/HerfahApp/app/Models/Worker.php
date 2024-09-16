<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;
    protected $fillable=[
        'about',
        'personal_image',
        'Image_cover',
        'price_perHour',
        'price_perMatter',
        'status',
        'department_id',
        'user_id'
    ];
    public function department(){
        return $this->belongsTo(Department::class);
    }
    public function portfoli(){
        return $this->hasMany(Portfoli::class,'worker_id');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function client(){
        return $this->belongsToMany(Client::class,"client_worker_orders");
    }
    public function orders(){
        return $this->hasMany(ClientWorkerOrder::class,'worker_id');
    }
}
