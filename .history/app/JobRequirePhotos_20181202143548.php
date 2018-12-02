<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobPhotos extends Model
{
    protected $fillable = [
        'job_photo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function documentos()
    {
        return $this->hasMany(Documento::class);
    }

}
