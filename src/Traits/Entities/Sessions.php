<?php

namespace Vormkracht10\Analytics\Traits\Entities;

use Illuminate\Support\Arr;
use Vormkracht10\Analytics\Period;

trait Sessions
{
    /**
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function averageSessionDuration(Period $period): float
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
    public function averageSessionDurationByDate(Period $period): array
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
    public function averagePageViewsPerSession(Period $period): float
    {
        $result = $this->setDateRange($period)
            ->addMetrics('screenPageViewsPerSession')
            ->getReport()
            ->dataTable;

        return (float) Arr::first(Arr::flatten($result));
    }

    /**
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function averagePageViewsPerSessionByDate(Period $period): array
    {
        return $this->setDateRange($period)
            ->addMetrics('screenPageViewsPerSession')
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
    public function averageSessionDurationInSeconds(Period $period): float
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
    public function averageSessionDurationInSecondsByDate(Period $period): array
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
    public function bounceRate(Period $period): float
    {
        $result = $this->setDateRange($period)
            ->addMetrics('bounceRate')
            ->getReport()
            ->dataTable;

        return (float) Arr::first(Arr::flatten($result));
    }

    /**
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function bounceRateByDate(Period $period): array
    {
        return $this->setDateRange($period)
            ->addMetrics('bounceRate')
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
    public function bounceRateByPage(Period $period): array
    {
        return $this->setDateRange($period)
            ->addMetrics('bounceRate')
            ->addDimensions('pagePath')
            ->orderByDimension('bounceRate')
            ->keepEmptyRows(true)
            ->getReport()
            ->dataTable;
    }
}
