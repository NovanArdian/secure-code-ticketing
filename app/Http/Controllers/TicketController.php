<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
        {
            $tickets = \App\Models\Ticket::all();
            return view('tickets.index', compact('tickets'));
        }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
        {
            return view('tickets.create');
        }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
        {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'status' => 'required|string',
            ]);
            $ticket = \App\Models\Ticket::create($validated);
            return redirect()->route('tickets.show', $ticket->id)->with('success', 'Ticket created successfully');
        }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
        {
            $ticket = \App\Models\Ticket::findOrFail($id);
            return view('tickets.show', compact('ticket'));
        }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
        {
            $ticket = \App\Models\Ticket::findOrFail($id);
            return view('tickets.edit', compact('ticket'));
        }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
        {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'status' => 'required|string',
            ]);
            $ticket = \App\Models\Ticket::findOrFail($id);
            $ticket->update($validated);
            return redirect()->route('tickets.show', $ticket->id)->with('success', 'Ticket updated successfully');
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
        {
            $ticket = \App\Models\Ticket::findOrFail($id);
            $ticket->delete();
            return redirect()->route('tickets.index')->with('success', 'Ticket deleted successfully');
        }
}
