<?php
namespace App\Services;

use App\Models\Lane;
use GuzzleHttp\Client;

class LaneService
{
    public function getAll()
    {
        return Lane::all();
    }

    public function create(array $data)
    {
        return Lane::create($data);
    }

    public function find(Lane $lane)
    {
        return $lane;
    }

    public function update(Lane $lane, array $data)
    {
        $lane->update($data);
        return $lane;
    }

    public function delete(Lane $lane)
    {
        $lane->delete();
    }

    public function createDefaultLanesForBoard($boardId)
    {
        $defaultLanes = ["To Do", "In Progress", "Done"];
        foreach ($defaultLanes as $name) {
            $lane = new Lane();
            $lane->board_id = $boardId;
            $lane->name = $name;
            $lane->save();
        }
    }
}
