<?php

namespace Backstage\Analytics\Traits\Google;

use Google\Analytics\Data\V1beta\MinuteRange;

trait MinuteRangeTrait
{
    public array $minuteRanges = [];

    public function setMinuteRange(?string $name, ?int $start, ?int $end): self
    {
        $this->minuteRanges = [
            $this->makeMinuteRange($name, $start, $end),
        ];

        return $this;
    }

    public function setMinuteRanges(array ...$items): self
    {
        $this->minuteRanges = [];

        foreach ($items as $item) {
            $this->minuteRanges[] = $this->makeMinuteRange(
                $item['name'] ?? null,
                $item['start'] ?? null,
                $item['end'] ?? null,
            );
        }

        return $this;
    }

    private function makeMinuteRange(?string $name, ?int $start, ?int $end): MinuteRange
    {
        // The native protobuf extension rejects a null name with
        // "Cannot convert '' to string", so only set it when provided.
        return new MinuteRange(array_filter([
            'name' => $name,
            'start_minutes_ago' => $start,
            'end_minutes_ago' => $end,
        ], fn (mixed $value): bool => $value !== null));
    }

    private function validateStartAndEnd(?int $start, ?int $end): void
    {
        if ($start > $end) {
            throw new \Exception('Start cannot be greater than end');
        }
    }
}
