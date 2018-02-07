<?php

namespace With\Commands;

use EventSauce\EventSourcing\AggregateRootId;
use EventSauce\EventSourcing\Command;
use EventSauce\EventSourcing\Event;
use EventSauce\EventSourcing\PointInTime;

final class DoSomething implements Command
{
    /**
     * @var PointInTime
     */
    private $timeOfRequest;

    /**
     * @var AggregateRootId
     */
    private $aggregateRootId;

    /**
     * @var string
     */
    private $reason;

    public function __construct(
        AggregateRootId $aggregateRootId,
        PointInTime $timeOfRequest,
        string $reason
    ) {
        $this->aggregateRootId = $aggregateRootId;
        $this->timeOfRequest = $timeOfRequest;
        $this->reason = $reason;
    }

    public function timeOfRequest(): PointInTime
    {
        return $this->timeOfRequest;
    }

    public function aggregateRootId(): AggregateRootId
    {
        return $this->aggregateRootId;
    }

    public function reason(): string
    {
        return $this->reason;
    }

}
