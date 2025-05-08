<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    // Display a list of all agents
    public function index()
    {
        $agents = Agent::all();
        return view('agents.index', compact('agents'));
    }

    // Show the form for creating a new agent
    public function create()
    {
        return view('agents.create');
    }

    // Store a newly created agent
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'specialization' => 'nullable|string|max:255',
        ]);

        // Create a new agent
        Agent::create($request->all());

        // Redirect back to the agents list with a success message
        return redirect()->route('agents.index')->with('success', 'Agent created successfully!');
    }

    // Show the form for editing an agent
    public function edit($id)
    {
        $agent = Agent::findOrFail($id);
        return view('agents.edit', compact('agent'));
    }

    // Update the specified agent
    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'specialization' => 'nullable|string|max:255',
        ]);

        $agent = Agent::findOrFail($id);
        $agent->update($request->all());

        // Redirect back to the agents list with a success message
        return redirect()->route('agents.index')->with('success', 'Agent updated successfully!');
    }

    // Delete the specified agent
    public function destroy($id)
    {
        $agent = Agent::findOrFail($id);
        $agent->delete();

        // Redirect back to the agents list with a success message
        return redirect()->route('agents.index')->with('success', 'Agent deleted successfully!');
    }
}
