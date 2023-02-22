<?php

namespace Vormkracht10\Analytics\Traits\Custom;

use Illuminate\Support\Arr;
use Vormkracht10\Analytics\Period;

trait VisitorDataTrait
{
    public function getAverageSessionDuration(Period $period): float
    {
        $result = $this->setDateRange($period)
            ->addMetrics('averageSessionDuration')
            ->getReport()
            ->table;

        return (float) Arr::first(Arr::flatten($result));
    }
}
