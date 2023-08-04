<?php

namespace Vormkracht10\Analytics\Service;

use Vormkracht10\Analytics\Traits\Google\DateRangeTrait;
use Vormkracht10\Analytics\Traits\Google\DimensionTrait;
use Vormkracht10\Analytics\Traits\Google\FilterByTrait;
use Vormkracht10\Analytics\Traits\Google\MetricAggregationTrait;
use Vormkracht10\Analytics\Traits\Google\MetricTrait;
use Vormkracht10\Analytics\Traits\Google\MinuteRangeTrait;
use Vormkracht10\Analytics\Traits\Google\OrderByTrait;
use Vormkracht10\Analytics\Traits\Google\RowConfigTrait;
use Vormkracht10\Analytics\Traits\ResponseFormatterTrait;

class GoogleAnalyticsService
{
    use DateRangeTrait,
        MinuteRangeTrait,
        MetricTrait,
        DimensionTrait,
        OrderByTrait,
        MetricAggregationTrait,
        FilterByTrait,
        RowConfigTrait,
        ResponseFormatterTrait;
}
