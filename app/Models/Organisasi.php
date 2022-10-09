<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organisasi extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function projeks()
    {
        return $this->hasMany(Projek::class);
    }    

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }        
}
