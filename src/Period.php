<?php

namespace Vormkracht10\Analytics;

use Illuminate\Support\Carbon;

class Period
{
    public Carbon $startDate;

    public Carbon $endDate;

    final public function __construct(Carbon $startDate, Carbon $endDate)
    {
        if ($startDate->greaterThan($endDate)) {
            throw new \Exception('Start date cannot be greater than end date');
        }

        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public static function make(Carbon $startDate, Carbon $endDate): self
    {
        return new self($startDate, $endDate);
    }

    public static function makeFromDays(int $days): self
    {
        $endDate = Carbon::today();
        $startDate = Carbon::today()->subDays($days);

        return new self($startDate, $endDate);
    }

    public static function makeFromMonths(int $months): self
    {
        $endDate = Carbon::today();
        $startDate = Carbon::today()->subMonths($months)->startOfDay();

        return new self($startDate, $endDate);
    }

    public static function makeFromYears(int $years): self
    {
        $endDate = Carbon::today();
        $startDate = Carbon::today()->subYears($years)->startOfDay();

        return new self($startDate, $endDate);
    }
}
