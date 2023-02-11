<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }    

    public function projek()
    {
        return $this->belongsTo(Projek::class);
    }         

    public function message()
    {
        return $this->belongsTo(TicketMessage::class);
    }         
}
