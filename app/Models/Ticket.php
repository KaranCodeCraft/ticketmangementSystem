<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'subject',
        'description',
        'category',
        'priority',
        'status',
        'agent_id',
    ];

    // Define the relationship between a ticket and the user who created it
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function replies()
    {
        return $this->hasMany(TicketReply::class, 'ticket_id');
    }
    // In the Ticket model
    public function agent()
    {
        return $this->belongsTo(Agent::class); // Each ticket belongs to one agent
    }
}
