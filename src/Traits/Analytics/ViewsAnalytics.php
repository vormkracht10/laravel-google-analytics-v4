<?php

namespace Vormkracht10\Analytics\Traits\Analytics;

use Illuminate\Support\Arr;
use Vormkracht10\Analytics\Enums\Direction;
use Vormkracht10\Analytics\Period;

trait ViewsAnalytics
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

    /**
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function totalViewsByPagePath(Period $period): array
    {
        return $this->setDateRange($period)
            ->addMetrics('screenPageViews')
            ->addDimensions('pagePath')
            ->getReport()
            ->dataTable;
    }

    /**
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function topViewsByPagePath(Period $period, int $limit = 10): array
    {
        return $this->setDateRange($period)
            ->addMetrics('screenPageViews')
            ->addDimensions('pagePath')
            ->orderByMetric('screenPageViews', Direction::DESC)
            ->limit($limit)
            ->getReport()
            ->dataTable;
    }

    /**
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function totalViewsByPageTitle(Period $period): array
    {
        return $this->setDateRange($period)
            ->addMetrics('screenPageViews')
            ->addDimensions('pageTitle')
            ->getReport()
            ->dataTable;
    }

    /**
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function topViewsByPageTitle(Period $period, int $limit = 10): array
    {
        return $this->setDateRange($period)
            ->addMetrics('screenPageViews')
            ->addDimensions('pageTitle')
            ->orderByMetric('screenPageViews', Direction::DESC)
            ->limit($limit)
            ->getReport()
            ->dataTable;
    }

    /**
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function totalViewsByPageUrl(Period $period): array
    {
        return $this->setDateRange($period)
            ->addMetrics('screenPageViews')
            ->addDimensions('fullPageUrl')
            ->getReport()
            ->dataTable;
    }

    /**
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function topViewsByPageUrl(Period $period, int $limit = 10): array
    {
        return $this->setDateRange($period)
            ->addMetrics('screenPageViews')
            ->addDimensions('fullPageUrl')
            ->orderByMetric('screenPageViews', Direction::DESC)
            ->limit($limit)
            ->getReport()
            ->dataTable;
    }

    /**
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function totalViewsByCountry(Period $period): array
    {
        return $this->setDateRange($period)
            ->addMetrics('screenPageViews')
            ->addDimensions('country')
            ->getReport()
            ->dataTable;
    }

    /**
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function topViewsByCountry(Period $period, int $limit = 10): array
    {
        return $this->setDateRange($period)
            ->addMetrics('screenPageViews')
            ->addDimensions('country')
            ->orderByMetric('screenPageViews', Direction::DESC)
            ->limit($limit)
            ->getReport()
            ->dataTable;
    }

    /**
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function totalViewsByCity(Period $period): array
    {
        return $this->setDateRange($period)
            ->addMetrics('screenPageViews')
            ->addDimensions('city')
            ->getReport()
            ->dataTable;
    }

    /**
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function topViewsByCity(Period $period, int $limit = 10): array
    {
        return $this->setDateRange($period)
            ->addMetrics('screenPageViews')
            ->addDimensions('city')
            ->orderByMetric('screenPageViews', Direction::DESC)
            ->limit($limit)
            ->getReport()
            ->dataTable;
    }
}
