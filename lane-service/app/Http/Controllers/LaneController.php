<?php

namespace App\Http\Controllers;

use App\Models\Lane;
use App\Services\LaneService;
use App\Http\Resources\LaneResource;
use App\Http\Requests\LaneRequest;

class LaneController extends Controller
{
    protected $laneService;

    public function __construct(LaneService $laneService)
    {
        $this->laneService = $laneService;
    }

    public function index()
    {
        return LaneResource::collection($this->laneService->getAll());
    }

    public function store(LaneRequest $request)
    {
        $lane = $this->laneService->create($request->validated());
        return new LaneResource($lane);
    }

    public function show(Lane $lane)
    {
        return new LaneResource($this->laneService->find($lane));
    }

    public function update(LaneRequest $request, Lane $lane)
    {
        $updatedLane = $this->laneService->update($lane, $request->validated());
        return new LaneResource($updatedLane);
    }

    public function destroy(Lane $lane)
    {
        $this->laneService->delete($lane);
        return response()->json(null, 204);
    }
}
