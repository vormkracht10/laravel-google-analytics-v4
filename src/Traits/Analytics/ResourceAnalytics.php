<?php

namespace Vormkracht10\Analytics\Traits\Analytics;

use Vormkracht10\Analytics\Enums\Direction;
use Vormkracht10\Analytics\Period;

trait ResourceAnalytics
{
    public function getTopReferrers(Period $period, int $limit): array
    {
        $googleAnalytics = $this->googleAnalytics
            ->setDateRange($period)
            ->addMetrics('sessions')
            ->addDimensions('pageReferrer')
            ->orderByMetric('sessions', Direction::DESC)
            ->limit($limit);

        return $this->getReport($googleAnalytics)
            ->dataTable;
    }

    public function getTopReferrersByPageTitle(Period $period, int $limit): array
    {
        $googleAnalytics = $this->googleAnalytics
            ->setDateRange($period)
            ->addMetrics('sessions')
            ->addDimensions('pageReferrer', 'pageTitle')
            ->orderByMetric('sessions', Direction::DESC)
            ->limit($limit);

        return $this->getReport($googleAnalytics)
            ->dataTable;
    }

    public function getLandingPagesByPageTitle(Period $period, int $limit): array
    {
        $googleAnalytics = $this->googleAnalytics
            ->setDateRange($period)
            ->addMetrics('sessions')
            ->addDimensions('landingPage', 'pageTitle')
            ->orderByMetric('sessions', Direction::DESC)
            ->limit($limit);

        return $this->getReport($googleAnalytics)
            ->dataTable;
    }

    public function getLandingPagesPlusQueryStringByPageTitle(Period $period, int $limit): array
    {
        $googleAnalytics = $this->googleAnalytics
            ->setDateRange($period)
            ->addMetrics('sessions')
            ->addDimensions('landingPagePlusQueryString', 'pageTitle')
            ->orderByMetric('sessions', Direction::DESC)
            ->limit($limit);

        return $this->getReport($googleAnalytics)
            ->dataTable;
    }

        public function getLandingPages(Period $period, int $limit): array
    {
        $googleAnalytics = $this->googleAnalytics
            ->setDateRange($period)
            ->addMetrics('sessions')
            ->addDimensions('landingPage')
            ->orderByMetric('sessions', Direction::DESC)
            ->limit($limit);

        return $this->getReport($googleAnalytics)
            ->dataTable;
    }

    public function getTopTrafficSources(Period $period, int $limit): array
    {
        $googleAnalytics = $this->googleAnalytics
            ->setDateRange($period)
            ->addMetrics('sessions')
            ->addDimensions('defaultChannelGroup')
            ->orderByMetric('sessions', Direction::DESC)
            ->limit($limit);

        return $this->getReport($googleAnalytics)
            ->dataTable;
    }

    public function getTopBacklinks(Period $period, int $limit): array
    {
        $googleAnalytics = $this->googleAnalytics
            ->setDateRange($period)
            ->addMetrics('sessions')
            ->addDimensions('sessionSourceMedium')
            ->orderByMetric('sessions', Direction::DESC)
            ->limit($limit);

        return $this->getReport($googleAnalytics)
            ->dataTable;
    }

    public function getTopSearches(Period $period, int $limit): array
    {
        $googleAnalytics = $this->googleAnalytics
            ->setDateRange($period)
            ->addMetrics('sessions')
            ->addDimensions('searchTerm')
            ->orderByMetric('sessions', Direction::DESC)
            ->limit($limit);

        return $this->getReport($googleAnalytics)
            ->dataTable;
    }
}
