<?php

namespace App\Services;

use App\Models\Board;
use GuzzleHttp\Client;
use App\Events\BoardCreated;
use App\Events\BoardUpdated;
use App\Events\BoardDeleted;

class BoardService
{
    public function getAll()
    {
        return Board::all();
    }

    public function create(array $data)
    {
        $board = Board::create($data);
        event(new BoardCreated($board->id));  // Dispatching event when board is created
        return $board;
    }

    public function find(Board $board)
    {
        return $board;
    }

    public function update(Board $board, array $data)
    {
        $board->update($data);
        event(new BoardUpdated($board->id));
        return $board;
    }

    public function delete(Board $board)
    {
        $boardId = $board->id;
        $board->delete();
        event(new BoardDeleted($boardId));
        return $board;
    }
}
