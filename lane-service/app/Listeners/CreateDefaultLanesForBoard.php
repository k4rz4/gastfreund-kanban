<?php
namespace App\Listeners;

use App\Events\BoardCreated;
use App\Services\LaneService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateDefaultLanesForBoard implements ShouldQueue
{
    use InteractsWithQueue;

    protected $laneService;

    public function __construct(LaneService $laneService)
    {
        $this->laneService = $laneService;
    }

    public function handle(BoardCreated $event)
    {
        $this->laneService->createDefaultLanesForBoard($event->boardId);
    }
}
