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
    public function getAveragePageViewsPerSession(Period $period): float
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
    public function getAveragePageViewsPerSessionByDate(Period $period): array
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
    public function getAverageSessionDurationInSeconds(Period $period): float
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
    public function getAverageSessionDurationInSecondsByDate(Period $period): array
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
    public function getBounceRate(Period $period): float
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
    public function getBounceRateByDate(Period $period): array
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
    public function getBounceRateByPage(Period $period): array
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
