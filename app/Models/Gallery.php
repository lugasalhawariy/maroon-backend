<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'activities_id', 'photo'
    ];

    protected $hidden = [

    ];

    public function activities()
    {
        return $this->belongsTo(Activity::class, 'activities_id', 'id');
    }
    
    public function getPhotoAttribute($value){
        return url('storage/', $value);
    }
}
