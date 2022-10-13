<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProTransaksi extends Model
{
    use HasFactory;

    public function projek()
    {
        return $this->belongsTo(Projek::class);
    }        

    public function organisasi()
    {
        return $this->belongsTo(Organisasi::class);
    }  
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }  
}
