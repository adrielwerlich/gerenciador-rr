<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\JobRequire;

class JobPhotos extends Model
{
    protected $fillable = [
        'job_photo'
    ];


    public function job()
    {
        return $this->belongsTo(JobRequire::class);
    }

}
