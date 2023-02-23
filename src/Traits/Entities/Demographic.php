<?php

namespace Vormkracht10\Analytics\Traits\Entities;

use Vormkracht10\Analytics\Enums\Direction;
use Vormkracht10\Analytics\Period;

trait Demographic
{
    /**
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function getMostUsersByLanguage(Period $period, int $limit): array
    {
        return $this->setDateRange($period)
            ->addMetrics('totalUsers')
            ->addDimensions('language')
            ->orderByMetric('totalUsers', Direction::DESC)
            ->limit($limit)
            ->getReport()
            ->dataTable;
    }

    /**
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function getTotalUsersByLanguage(Period $period): array
    {
        return $this->setDateRange($period)
            ->addMetrics('totalUsers')
            ->addDimensions('language')
            ->getReport()
            ->dataTable;
    }

    /**
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function getMostUsersByCountry(Period $period, int $limit): array
    {
        return $this->setDateRange($period)
            ->addMetrics('totalUsers')
            ->addDimensions('country')
            ->orderByMetric('totalUsers', Direction::DESC)
            ->limit($limit)
            ->getReport()
            ->dataTable;
    }

    /**
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function getTotalUsersByCountry(Period $period): array
    {
        return $this->setDateRange($period)
            ->addMetrics('totalUsers')
            ->addDimensions('country')
            ->getReport()
            ->dataTable;
    }

    /**
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function getMostUsersByCity(Period $period, int $limit): array
    {
        return $this->setDateRange($period)
            ->addMetrics('totalUsers')
            ->addDimensions('city')
            ->orderByMetric('totalUsers', Direction::DESC)
            ->limit($limit)
            ->getReport()
            ->dataTable;
    }

    /**
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function getTotalUsersByCity(Period $period): array
    {
        return $this->setDateRange($period)
            ->addMetrics('totalUsers')
            ->addDimensions('city')
            ->getReport()
            ->dataTable;
    }

    /**
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function getTotalUsersByGender(Period $period): array
    {
        return $this->setDateRange($period)
            ->addMetrics('totalUsers')
            ->addDimensions('userGender')
            ->orderByMetric('totalUsers', Direction::DESC)
            ->getReport()
            ->dataTable;
    }

    /**
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function getTotalUsersByAge(Period $period): array
    {
        return $this->setDateRange($period)
            ->addMetrics('totalUsers')
            ->addDimensions('userAgeBracket')
            ->orderByMetric('totalUsers', Direction::DESC)
            ->getReport()
            ->dataTable;
    }
}
