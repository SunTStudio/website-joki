<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kerjaan extends Model
{
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function progresKerjaan()
    {
        return $this->hasMany(ProgresKerjaan::class);
    }
    public function testimoni()
    {
        return $this->hasOne(Testimoni::class);
    }
    
}
