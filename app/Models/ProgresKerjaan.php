<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgresKerjaan extends Model
{
    protected $guarded = ['id'];

    public function kerjaan()
    {
        return $this->belongsTo(Kerjaan::class);
    }
    
}
