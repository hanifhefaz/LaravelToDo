<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    use HasFactory;

    protected $fillable = [
        'title', 'description', 'status','category_id',
    ];

    protected static $logAttributes = ['title', 'description', 'status','category_id',];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class,'id','name');

    }

    public function scopeOfStartDate($query,$start_date)
    {
        if(isset($start_date)){

            return $query->where('created_at', '>=', $start_date);
        }
        return $query;
    }
    public function scopeOfEndDate($query,$end_date)
    {
        if(isset($end_date)){

            return $query->where('created_at', '<=', $end_date);
        }
        return $query;
    }

    public function scopeOfStatus($query,$status)
    {
        if(isset($status)){

            return $query->where('status',$status);
        }
        return $query;
    }
}
