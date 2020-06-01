<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Activity extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title', 'slug', 'about', 'start_activity', 'finish', 'end_activity', 'role_upload'
    ];

    protected $hidden = [
        
    ];

    public function gallery()
    {
        return $this->hasMany(Gallery::class, 'activities_id', 'id');
    }
}
