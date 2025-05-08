<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Ticket;
use App\Models\TicketReply;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    // Show all tickets for the logged-in user
    public function index()
    {
        // Agar user admin hai to sabhi tickets dikhaye
        if (auth()->user()->role === 'admin') {
            $tickets = Ticket::all();
        } else {
            // Agar user normal hai to sirf apne tickets dikhaye
            $tickets = Ticket::where('user_id', Auth::id())->get();
        }

        return view('tickets.index', compact('tickets'));
    }


    // Show the form to create a new ticket
    public function create()
    {
        return view('tickets.create');
    }

    // Store a new ticket
    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|in:Technical,Billing,General',
            'priority' => 'required|in:Low,Medium,High,Urgent',
        ]);

        // Create the ticket
        Ticket::create([
            'user_id' => Auth::id(),
            'subject' => $request->subject,
            'description' => $request->description,
            'category' => $request->category,
            'priority' => $request->priority,
            'status' => 'Open',
        ]);

        return redirect()->route('tickets.index')->with('message', 'Ticket created successfully!');
    }

    // Show a specific ticket
    public function show($id)
    {
        $ticket = Ticket::with(['agent', 'replies' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }])->findOrFail($id);

        // Fetch agents for dropdown if needed
        $agents = Agent::all();

        return view('tickets.show', compact('ticket', 'agents'));
    }

    // Show the form to edit a ticket
    public function edit($id)
    {
        $ticket = Ticket::findOrFail($id);
        return view('tickets.edit', compact('ticket'));
    }

    // Update the ticket
    public function update(Request $request, Ticket $ticket)
    {
        $data = $request->validate([
            'subject' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|in:Technical,Billing,General',
            'priority' => 'required|in:Low,Medium,High,Urgent',
            'status' => 'required|in:Open,In Progress,Closed',
        ]);
        $ticket->update($data);
        return redirect()->route('tickets.index')->with('message', 'Ticket updated successfully!');
    }

    // Delete the ticket
    public function destroy($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->delete();
        return redirect()->route('tickets.index')->with('message', 'Ticket deleted successfully!');
    }

    public function reply(Request $request, Ticket $ticket)
    {
        $request->validate([
            'message' => 'required|string'
        ]);

        TicketReply::create([
            'ticket_id' => $ticket->id,
            'user_id' => Auth::id(),
            'message' => $request->message,
        ]);

        return redirect()->route('tickets.show', $ticket->id)->with('message', 'Reply added successfully!');
    }

    public function replies()
    {
        return $this->hasMany(TicketReply::class, 'ticket_id');
    }

    public function assignAgent(Request $request, $ticketId)
    {
        $ticket = Ticket::find($ticketId);

        // Validate the request to make sure the agent is selected
        $request->validate([
            'agent_id' => 'required|exists:agents,id', // Ensure agent exists in the agents table
        ]);

        // Assign the agent to the ticket
        $ticket->agent_id = $request->input('agent_id');
        $ticket->save();

        return back()->with('success', 'Agent assigned successfully!');
    }

    public function agent()
    {
        return $this->belongsTo(Agent::class);  // Link to agents table
    }
}
