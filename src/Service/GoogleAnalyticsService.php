<?php

namespace Vormkracht10\Analytics\Service;

use Vormkracht10\Analytics\Traits\DateRangeTrait;
use Vormkracht10\Analytics\Traits\DimensionTrait;
use Vormkracht10\Analytics\Traits\FilterByTrait;
use Vormkracht10\Analytics\Traits\MetricAggregationTrait;
use Vormkracht10\Analytics\Traits\MetricTrait;
use Vormkracht10\Analytics\Traits\OrderByTrait;
use Vormkracht10\Analytics\Traits\ResponseFormatterTrait;
use Vormkracht10\Analytics\Traits\RowConfigTrait;

class GoogleAnalyticsService
{
    use DateRangeTrait,
        MetricTrait,
        DimensionTrait,
        OrderByTrait,
        MetricAggregationTrait,
        FilterByTrait,
        RowConfigTrait,
        ResponseFormatterTrait;
}
