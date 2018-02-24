<?php

namespace Group\With\Defaults;

use EventSauce\EventSourcing\Event;
use EventSauce\EventSourcing\PointInTime;

final class EventWithDescription implements Event
{
    /**
     * @var string
     */
    private $description;

    /**
     * @var PointInTime
     */
    private $timeOfRecording;

    public function __construct(
        PointInTime $timeOfRecording,
        string $description
    ) {
        $this->timeOfRecording = $timeOfRecording;
        $this->description = $description;
    }

    public function description(): string
    {
        return $this->description;
    }

    public function timeOfRecording(): PointInTime
    {
        return $this->timeOfRecording;
    }

    public static function fromPayload(
        array $payload,
        PointInTime $timeOfRecording): Event
    {
        return new EventWithDescription(
            $timeOfRecording,
            (string) $payload['description']
        );
    }

    public function toPayload(): array
    {
        return [
            'description' => (string) $this->description,
            '__event_version' => 1,
        ];
    }

    /**
     * @codeCoverageIgnore
     */
    public function withDescription(string $description): EventWithDescription
    {
        $this->description = $description;

        return $this;
    }

    public static function with(PointInTime $timeOfRecording): EventWithDescription
    {
        return new EventWithDescription(
            $timeOfRecording,
            (string) 'This is a description.'
        );
    }

}
