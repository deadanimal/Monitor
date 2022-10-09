<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projek extends Model
{
    use HasFactory;

    public function organisasi()
    {
        return $this->belongsTo(Organisasi::class);
    }     
    
    public function activities()
    {
        return $this->hasMany(Activity::class);
    }       
}
