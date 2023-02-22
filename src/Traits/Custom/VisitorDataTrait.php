<?php

namespace Vormkracht10\Analytics\Traits\Custom;

use Illuminate\Support\Arr;
use Vormkracht10\Analytics\Period;

trait VisitorDataTrait
{
    /**
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function getAverageSessionDuration(Period $period): float
    {
        $result = $this->setDateRange($period)
            ->addMetrics('averageSessionDuration')
            ->getReport()
            ->dataTable;

        return (float) Arr::first(Arr::flatten($result));
    }

    /**
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function getAverageSessionDurationByDate(Period $period): array
    {
        return $this->setDateRange($period)
            ->addMetrics('averageSessionDuration')
            ->addDimensions('date')
            ->orderByDimension('date')
            ->keepEmptyRows(true)
            ->getReport()
            ->dataTable;
    }

    /**
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function getTotalViews(Period $period): int
    {
        $result = $this->setDateRange($period)
            ->addMetrics('screenPageViews')
            ->getReport()
            ->dataTable;

        return (int) Arr::first(Arr::flatten($result));
    }

    /**
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function getTotalViewsByDate(Period $period): array
    {
        return $this->setDateRange($period)
            ->addMetrics('screenPageViews')
            ->addDimensions('date')
            ->orderByDimension('date')
            ->keepEmptyRows(true)
            ->getReport()
            ->dataTable;
    }
}
