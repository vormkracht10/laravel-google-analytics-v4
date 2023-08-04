<?php

namespace Vormkracht10\Analytics\Traits\Google;

use Google\Analytics\Data\V1beta\MinuteRange;

trait MinuteRangeTrait
{
    public array $minuteRanges = [];

    public function setMinuteRange(?string $name, ?int $start, ?int $end): self
    {
        $this->minuteRanges = [
            new MinuteRange([
                'name' => $name,
                'startMinutesAgo' => $start,
                'endMinutesAgo' => $end,
            ]),
        ];

        return $this;
    }

    public function setMinuteRanges(...$items): self
    {
        $this->minuteRanges = [];

        foreach ($items as $item) {
            $this->minuteRanges[] = new MinuteRange([
                'name' => $item['name'],
                'startMinutesAgo' => $item['start'],
                'endMinutesAgo' => $item['end']
            ]);
        }

        return $this;
    }

    private function validateStartAndEnd(?int $start, ?int $end): void
    {
        if ($start > $end) {
            throw new \Exception('Start cannot be greater than end');
        }
    }
}
