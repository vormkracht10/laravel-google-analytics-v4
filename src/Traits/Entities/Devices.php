<?php

namespace Vormkracht10\Analytics\Traits\Entities;

use Vormkracht10\Analytics\Enums\Direction;
use Vormkracht10\Analytics\Period;

trait Devices
{
    public function getMostUsersByBrowser(Period $period, int $limit): array
    {
        return $this->setDateRange($period)
            ->addMetrics('totalUsers')
            ->addDimensions('browser')
            ->orderByMetric('totalUsers', Direction::DESC)
            ->limit($limit)
            ->getReport()
            ->dataTable;
    }
    
    public function getTotalUsersByBrowser(Period $period): array
    {
        return $this->setDateRange($period)
            ->addMetrics('totalUsers')
            ->addDimensions('browser')
            ->getReport()
            ->dataTable;
    }

    public function getMostUsersByOperatingSystem(Period $period, int $limit): array
    {
        return $this->setDateRange($period)
            ->addMetrics('totalUsers')
            ->addDimensions('operatingSystem')
            ->orderByMetric('totalUsers', Direction::DESC)
            ->limit($limit)
            ->getReport()
            ->dataTable;
    }

    public function getTotalUsersByOperatingSystem(Period $period): array
    {
        return $this->setDateRange($period)
            ->addMetrics('totalUsers')
            ->addDimensions('operatingSystem')
            ->getReport()
            ->dataTable;
    }

    public function getMostUsersByDeviceCategory(Period $period, int $limit): array
    {
        return $this->setDateRange($period)
            ->addMetrics('totalUsers')
            ->addDimensions('deviceCategory')
            ->orderByMetric('totalUsers', Direction::DESC)
            ->limit($limit)
            ->getReport()
            ->dataTable;
    }

    public function getTotalUsersByDeviceCategory(Period $period): array
    {
        return $this->setDateRange($period)
            ->addMetrics('totalUsers')
            ->addDimensions('deviceCategory')
            ->getReport()
            ->dataTable;
    }

    public function getMostUsersByMobileDeviceBranding(Period $period, int $limit): array
    {
        return $this->setDateRange($period)
            ->addMetrics('totalUsers')
            ->addDimensions('mobileDeviceBranding')
            ->orderByMetric('totalUsers', Direction::DESC)
            ->limit($limit)
            ->getReport()
            ->dataTable;
    }

    public function getTotalUsersByMobileDeviceBranding(Period $period): array
    {
        return $this->setDateRange($period)
            ->addMetrics('totalUsers')
            ->addDimensions('mobileDeviceBranding')
            ->getReport()
            ->dataTable;
    }

    public function getMostUsersByMobileDeviceModel(Period $period, int $limit): array
    {
        return $this->setDateRange($period)
            ->addMetrics('totalUsers')
            ->addDimensions('mobileDeviceModel')
            ->orderByMetric('totalUsers', Direction::DESC)
            ->limit($limit)
            ->getReport()
            ->dataTable;
    }

    public function getTotalUsersByMobileDeviceModel(Period $period): array
    {
        return $this->setDateRange($period)
            ->addMetrics('totalUsers')
            ->addDimensions('mobileDeviceModel')
            ->getReport()
            ->dataTable;
    }

    public function getMostUsersByMobileInputSelector(Period $period, int $limit): array
    {
        return $this->setDateRange($period)
            ->addMetrics('totalUsers')
            ->addDimensions('mobileInputSelector')
            ->orderByMetric('totalUsers', Direction::DESC)
            ->limit($limit)
            ->getReport()
            ->dataTable;
    }

    public function getTotalUsersByMobileInputSelector(Period $period): array
    {
        return $this->setDateRange($period)
            ->addMetrics('totalUsers')
            ->addDimensions('mobileInputSelector')
            ->getReport()
            ->dataTable;
    }

    public function getMostUsersByMobileDeviceInfo(Period $period, int $limit): array
    {
        return $this->setDateRange($period)
            ->addMetrics('totalUsers')
            ->addDimensions('mobileDeviceInfo')
            ->orderByMetric('totalUsers', Direction::DESC)
            ->limit($limit)
            ->getReport()
            ->dataTable;
    }

    public function getTotalUsersByMobileDeviceInfo(Period $period): array
    {
        return $this->setDateRange($period)
            ->addMetrics('totalUsers')
            ->addDimensions('mobileDeviceInfo')
            ->getReport()
            ->dataTable;
    }

    public function getMostUsersByMobileDeviceMarketingName(Period $period, int $limit): array
    {
        return $this->setDateRange($period)
            ->addMetrics('totalUsers')
            ->addDimensions('mobileDeviceMarketingName')
            ->orderByMetric('totalUsers', Direction::DESC)
            ->limit($limit)
            ->getReport()
            ->dataTable;
    }

    public function getTotalUsersByMobileDeviceMarketingName(Period $period): array
    {
        return $this->setDateRange($period)
            ->addMetrics('totalUsers')
            ->addDimensions('mobileDeviceMarketingName')
            ->getReport()
            ->dataTable;
    }

    public function getMostUsersByScreenResolution(Period $period, int $limit): array
    {
        return $this->setDateRange($period)
            ->addMetrics('totalUsers')
            ->addDimensions('screenResolution')
            ->orderByMetric('totalUsers', Direction::DESC)
            ->limit($limit)
            ->getReport()
            ->dataTable;
    }

    public function getTotalUsersByScreenResolution(Period $period): array
    {
        return $this->setDateRange($period)
            ->addMetrics('totalUsers')
            ->addDimensions('screenResolution')
            ->getReport()
            ->dataTable;
    }
}
