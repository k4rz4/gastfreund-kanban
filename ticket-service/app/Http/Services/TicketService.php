<?php
namespace App\Services;

use App\Models\Ticket;
use GuzzleHttp\Client;

class TicketService
{
    public function getAll($laneId = null)
    {
        if ($laneId) {
            return Ticket::where('lane_id', $laneId)->get();
        }
        return Ticket::all();
    }

    public function create(array $data)
    {
        return Ticket::create($data);
    }

    public function find(Ticket $ticket)
    {
        return $ticket;
    }


    public function update(Ticket $ticket, array $data)
    {
        $ticket->update($data);
        return $ticket;
    }

    public function delete(Ticket $ticket)
    {
        $ticket->delete();
    }
}
