<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TicketController extends Controller
{
    public function index(Request $request)
    {
        return Ticket::query()->when($request->status, fn ($query, $status) => $query->where('status', $status))->latest()->paginate(20);
    }

    public function store(Request $request)
    {
        $ticket = Ticket::create($this->validated($request));
        return response()->json($ticket, 201);
    }

    public function show(Ticket $ticket) { return $ticket; }

    public function update(Request $request, Ticket $ticket)
    {
        $ticket->update($this->validated($request, true));
        return $ticket->fresh();
    }

    private function validated(Request $request, bool $partial = false): array
    {
        return $request->validate([
            'subject' => [$partial ? 'sometimes' : 'required', 'string', 'max:160'],
            'description' => [$partial ? 'sometimes' : 'required', 'string', 'max:5000'],
            'requester_email' => [$partial ? 'sometimes' : 'required', 'email'],
            'status' => [$partial ? 'sometimes' : 'required', Rule::in(['open', 'in_progress', 'resolved'])],
            'priority' => [$partial ? 'sometimes' : 'required', Rule::in(['low', 'normal', 'high', 'urgent'])],
        ]);
    }
}
