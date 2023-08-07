<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Services\TicketService;
use App\Http\Resources\TicketResource;
use App\Http\Requests\TicketRequest;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    protected $ticketService;

    public function __construct(TicketService $ticketService)
    {
        $this->ticketService = $ticketService;
    }

    public function index(Request $request)
    {
        return TicketResource::collection($this->ticketService->getAll($request->query('lane_id')));
    }

    public function store(TicketRequest $request)
    {
        $ticket = $this->ticketService->create($request->validated());
        return new TicketResource($ticket);
    }

    public function show(Ticket $ticket)
    {
        return new TicketResource($this->ticketService->find($ticket));
    }

    public function update(TicketRequest $request, Ticket $ticket)
    {
        $updatedTicket = $this->ticketService->update($ticket, $request->validated());
        return new TicketResource($updatedTicket);
    }

    public function destroy(Ticket $ticket)
    {
        $this->ticketService->delete($ticket);
        return response()->json(null, 204);
    }
}
