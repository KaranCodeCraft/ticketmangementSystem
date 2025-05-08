<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;

    // Define the fillable attributes
    protected $fillable = [
        'name',         // Name of the agent
        'specialization', // Specialization of the agent
    ];

    // Define the relationship with tickets
    // In the Agent model
    public function tickets()
    {
        return $this->hasMany(Ticket::class); // One agent can have many tickets
    }
}
