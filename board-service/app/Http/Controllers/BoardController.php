<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;
use App\Services\BoardService;
use App\Http\Resources\BoardResource;
use App\Events\BoardCreated;

class BoardController extends Controller
{
    protected $boardService;

    public function __construct(BoardService $boardService)
    {
        $this->boardService = $boardService;
    }

    public function index()
    {
        return BoardResource::collection($this->boardService->getAll());
    }

    public function store(Request $request)
    {
        $board = $this->boardService->create($request->validated());
        event(new BoardCreated($board->id));
        return new BoardResource($board);
    }

    public function show(Board $board)
    {
        return new BoardResource($board);
    }

    public function update(Request $request, Board $board)
    {
        $updatedBoard = $this->boardService->update($board, $request->validated());
        return new BoardResource($updatedBoard);
    }

    public function destroy(Board $board)
    {
        $this->boardService->delete($board);
        return response()->json(null, 204);
    }
}