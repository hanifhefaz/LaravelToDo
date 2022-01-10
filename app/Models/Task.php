<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Task extends Model
{

    use HasFactory;

    protected $fillable = [
        'title', 'description', 'status','isShow','category_id','created_by','updated_by','deleted_by',
    ];

    protected static $logAttributes = ['title', 'description', 'status','isShow','category_id','created_by','updated_by','deleted_by',];

    protected $casts = [
        'isShow' => 'boolean',
      ];

    public function user()
    {
    	return $this->belongsTo(User::class,'id','created_by');
    }

    public function category(){
        return $this->belongsTo(Category::class,'id','category_id');

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

    public static function boot() {
        parent::boot();

        // create a event to happen on updating
        static::updating(function($table)  {
            $table->updated_by = Auth::user()->id ;
        });

        // create a event to happen on deleting
        static::deleting(function($table)  {
            $table->deleted_by = Auth::user()->id ;
        });

        // create a event to happen on saving
        static::saving(function($table)  {
            $table->created_by = Auth::user()->id ;
        });
    }
}