<?php

namespace Vormkracht10\Analytics\Traits\Analytics;

use Illuminate\Support\Arr;
use Vormkracht10\Analytics\Period;

trait UsersAnalytics
{
    /**
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function totalUsers(Period $period): int
    {
        $result = $this->setDateRange($period)
            ->addMetrics('totalUsers')
            ->getReport()
            ->dataTable;

        return (int) Arr::first(Arr::flatten($result));
    }

    /**
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function totalUsersByDate(Period $period): array
    {
        return $this->setDateRange($period)
            ->addMetrics('totalUsers')
            ->addDimensions('date')
            ->getReport()
            ->dataTable;
    }

    /**
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function totalUsersBySessionSource(Period $period): array
    {
        return $this->setDateRange($period)
            ->addMetrics('totalUsers')
            ->addDimensions('sessionSource')
            ->getReport()
            ->dataTable;
    }

    /**
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function totalUsersBySessionMedium(Period $period): array
    {
        return $this->setDateRange($period)
            ->addMetrics('totalUsers')
            ->addDimensions('sessionMedium')
            ->getReport()
            ->dataTable;
    }

    /**
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function totalUsersBySessionDevice(Period $period): array
    {
        return $this->setDateRange($period)
            ->addMetrics('totalUsers')
            ->addDimensions('sessionDevice')
            ->getReport()
            ->dataTable;
    }
}
