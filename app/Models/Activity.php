<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    public function projek()
    {
        return $this->belongsTo(Organisasi::class);
    }        

    public function organisasi()
    {
        return $this->belongsTo(Organisasi::class);
    }    
    
    public function pekerja()
    {
        return $this->belongsTo(User::class, 'pekerja_id');
    }  
    
    public function supervisor()
    {
        return $this->belongsTo(User::class, 'supervisor_id');
    }     
}
