<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function organisasi()
    {
        return $this->belongsTo(Organisasi::class);
    }    

    public function activity_pekerja()
    {
        return $this->hasMany(Activity::class, 'pekerja_id');
    }   
    
    public function activity_supervisor()
    {
        return $this->hasMany(Activity::class, 'supervisor_id');
    }  

    public function activity_pemeriksa()
    {
        return $this->hasMany(Activity::class, 'pemeriksa_id');
    }   
    
    public function activity_pengesah()
    {
        return $this->hasMany(Activity::class, 'pengesah_id');
    }       
    
    public function deliverable_pekerja()
    {
        return $this->hasMany(Deliverable::class, 'pekerja_id');
    }   
    
    public function deliverable_supervisor()
    {
        return $this->hasMany(Deliverable::class, 'supervisor_id');
    } 

    public function deliverable_pemeriksa()
    {
        return $this->hasMany(Deliverable::class, 'pemeriksa_id');
    } 
    
    public function deliverable_pengesah()
    {
        return $this->hasMany(Deliverable::class, 'pengesah_id');
    }     
    
    public function dokumens()
    {
        return $this->hasMany(Dokumen::class, 'user_id')->latest();
    }  
    
    public function notas()
    {
        return $this->hasMany(Nota::class);
    }          
}
