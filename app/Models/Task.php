<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Task extends Model
{

    use HasFactory;

    protected $fillable = [
        'title', 'description', 'status','isShow','category_id','created_by','updated_by','deleted_by','assignee'
    ];


    protected $casts = [
        'isShow' => 'boolean',
      ];

    public function relatedUser()
    {
    	return $this->hasOne(User::class,'id','assignee');
    }

    public function relatedCategory(){
        return $this->hasOne(Category::class,'id','category_id');

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

    public function scopeOfCreatedByMe($query)
    {
        return $query->where('created_by', Auth::user()->id);
    }

    public function scopeOfAssignedToMe($query)
    {
        return $query->where('assignee', Auth::user()->id);
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