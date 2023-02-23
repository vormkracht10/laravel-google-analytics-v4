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
    public function topUsersByLanguage(Period $period, int $limit = 10): array
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
    public function totalUsersByLanguage(Period $period): array
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
    public function topUsersByCountry(Period $period, int $limit = 10): array
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
    public function totalUsersByCountry(Period $period): array
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
    public function topUsersByCity(Period $period, int $limit = 10): array
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
    public function totalUsersByCity(Period $period): array
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
    public function totalUsersByGender(Period $period): array
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
    public function totalUsersByAge(Period $period): array
    {
        return $this->setDateRange($period)
            ->addMetrics('totalUsers')
            ->addDimensions('userAgeBracket')
            ->orderByMetric('totalUsers', Direction::DESC)
            ->getReport()
            ->dataTable;
    }
}
