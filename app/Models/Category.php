<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','created_by','updated_by','deleted_by',
    ];

    public function category(){
        return $this->belongsTo(Task::class,'category_id','id');
    }
    public function user(){
        return $this->belongsTo(Task::class,'created_by','id');
    }
    public function tasks(){
        return $this->hasMany(Task::class,'category_id','id');
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
