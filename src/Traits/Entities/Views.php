<?php

namespace Vormkracht10\Analytics\Traits\Entities;

use Illuminate\Support\Arr;
use Vormkracht10\Analytics\Enums\Direction;
use Vormkracht10\Analytics\Period;

trait Views
{
    /**
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function totalViews(Period $period): int
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
    public function totalViewsByDate(Period $period): array
    {
        return $this->setDateRange($period)
            ->addMetrics('screenPageViews')
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
    public function totalViewsByPage(Period $period): array
    {
        return $this->setDateRange($period)
            ->addMetrics('screenPageViews')
            ->addDimensions('pageTitle', 'fullPageUrl')
            ->getReport()
            ->dataTable;
    }

    /**
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function topViewsByPage(Period $period): array
    {
        return $this->getViewsByPage($period, Direction::DESC);
    }

    /**
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function leastViewsByPage(Period $period): array
    {
        return $this->getViewsByPage($period, Direction::ASC);
    }

    private function getViewsByPage(Period $period, Direction $direction): array
    {
        return $this->setDateRange($period)
            ->addMetrics('screenPageViews')
            ->addDimensions('pageTitle', 'fullPageUrl')
            ->orderByMetric('screenPageViews', $direction)
            ->getReport()
            ->dataTable;
    }
}
