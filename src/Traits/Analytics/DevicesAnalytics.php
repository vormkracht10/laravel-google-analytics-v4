<?php

namespace Vormkracht10\Analytics\Traits\Analytics;

use Vormkracht10\Analytics\Enums\Direction;
use Vormkracht10\Analytics\Period;

trait DevicesAnalytics
{
    /**
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function topUsersByBrowser(Period $period, int $limit = 10): array
    {
        return $this->setDateRange($period)
            ->addMetrics('totalUsers')
            ->addDimensions('browser')
            ->orderByMetric('totalUsers', Direction::DESC)
            ->limit($limit)
            ->getReport()
            ->dataTable;
    }

    /**
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function totalUsersByBrowser(Period $period): array
    {
        return $this->setDateRange($period)
            ->addMetrics('totalUsers')
            ->addDimensions('browser')
            ->getReport()
            ->dataTable;
    }

    /**
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function topUsersByOperatingSystem(Period $period, int $limit = 10): array
    {
        return $this->setDateRange($period)
            ->addMetrics('totalUsers')
            ->addDimensions('operatingSystem')
            ->orderByMetric('totalUsers', Direction::DESC)
            ->limit($limit)
            ->getReport()
            ->dataTable;
    }

    /**
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function totalUsersByOperatingSystem(Period $period): array
    {
        return $this->setDateRange($period)
            ->addMetrics('totalUsers')
            ->addDimensions('operatingSystem')
            ->getReport()
            ->dataTable;
    }

    /**
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function topUsersByDeviceCategory(Period $period, int $limit = 10): array
    {
        return $this->setDateRange($period)
            ->addMetrics('totalUsers')
            ->addDimensions('deviceCategory')
            ->orderByMetric('totalUsers', Direction::DESC)
            ->limit($limit)
            ->getReport()
            ->dataTable;
    }

    /**
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function totalUsersByDeviceCategory(Period $period): array
    {
        return $this->setDateRange($period)
            ->addMetrics('totalUsers')
            ->addDimensions('deviceCategory')
            ->getReport()
            ->dataTable;
    }

    /**
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function topUsersByMobileDeviceBranding(Period $period, int $limit = 10): array
    {
        return $this->setDateRange($period)
            ->addMetrics('totalUsers')
            ->addDimensions('mobileDeviceBranding')
            ->orderByMetric('totalUsers', Direction::DESC)
            ->limit($limit)
            ->getReport()
            ->dataTable;
    }

    /**
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function totalUsersByMobileDeviceBranding(Period $period): array
    {
        return $this->setDateRange($period)
            ->addMetrics('totalUsers')
            ->addDimensions('mobileDeviceBranding')
            ->getReport()
            ->dataTable;
    }

    /**
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function topUsersByMobileDeviceModel(Period $period, int $limit = 10): array
    {
        return $this->setDateRange($period)
            ->addMetrics('totalUsers')
            ->addDimensions('mobileDeviceModel')
            ->orderByMetric('totalUsers', Direction::DESC)
            ->limit($limit)
            ->getReport()
            ->dataTable;
    }

    /**
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function totalUsersByMobileDeviceModel(Period $period): array
    {
        return $this->setDateRange($period)
            ->addMetrics('totalUsers')
            ->addDimensions('mobileDeviceModel')
            ->getReport()
            ->dataTable;
    }

    /**
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function topUsersByMobileInputSelector(Period $period, int $limit = 10): array
    {
        return $this->setDateRange($period)
            ->addMetrics('totalUsers')
            ->addDimensions('mobileInputSelector')
            ->orderByMetric('totalUsers', Direction::DESC)
            ->limit($limit)
            ->getReport()
            ->dataTable;
    }

    /**
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function totalUsersByMobileInputSelector(Period $period): array
    {
        return $this->setDateRange($period)
            ->addMetrics('totalUsers')
            ->addDimensions('mobileInputSelector')
            ->getReport()
            ->dataTable;
    }

    /**
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function topUsersByMobileDeviceInfo(Period $period, int $limit = 10): array
    {
        return $this->setDateRange($period)
            ->addMetrics('totalUsers')
            ->addDimensions('mobileDeviceInfo')
            ->orderByMetric('totalUsers', Direction::DESC)
            ->limit($limit)
            ->getReport()
            ->dataTable;
    }

    /**
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function totalUsersByMobileDeviceInfo(Period $period): array
    {
        return $this->setDateRange($period)
            ->addMetrics('totalUsers')
            ->addDimensions('mobileDeviceInfo')
            ->getReport()
            ->dataTable;
    }

    /**
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function topUsersByMobileDeviceMarketingName(Period $period, int $limit = 10): array
    {
        return $this->setDateRange($period)
            ->addMetrics('totalUsers')
            ->addDimensions('mobileDeviceMarketingName')
            ->orderByMetric('totalUsers', Direction::DESC)
            ->limit($limit)
            ->getReport()
            ->dataTable;
    }

    /**
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function totalUsersByMobileDeviceMarketingName(Period $period): array
    {
        return $this->setDateRange($period)
            ->addMetrics('totalUsers')
            ->addDimensions('mobileDeviceMarketingName')
            ->getReport()
            ->dataTable;
    }

    /**
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function topUsersByScreenResolution(Period $period, int $limit = 10): array
    {
        return $this->setDateRange($period)
            ->addMetrics('totalUsers')
            ->addDimensions('screenResolution')
            ->orderByMetric('totalUsers', Direction::DESC)
            ->limit($limit)
            ->getReport()
            ->dataTable;
    }

    /**
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function totalUsersByScreenResolution(Period $period): array
    {
        return $this->setDateRange($period)
            ->addMetrics('totalUsers')
            ->addDimensions('screenResolution')
            ->getReport()
            ->dataTable;
    }

    /**
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function topUsersByPlatform(Period $period, int $limit = 10): array
    {
        return $this->setDateRange($period)
            ->addMetrics('totalUsers')
            ->addDimensions('platform')
            ->orderByMetric('totalUsers', Direction::DESC)
            ->limit($limit)
            ->getReport()
            ->dataTable;
    }

    /**
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function totalUsersByPlatform(Period $period): array
    {
        return $this->setDateRange($period)
            ->addMetrics('totalUsers')
            ->addDimensions('platform')
            ->getReport()
            ->dataTable;
    }
}
