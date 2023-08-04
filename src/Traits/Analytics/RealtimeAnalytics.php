<?php

namespace Vormkracht10\Analytics\Traits\Analytics;

use Illuminate\Support\Arr;
use Vormkracht10\Analytics\Period;

trait RealtimeAnalytics
{
    /**
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function activeUsers(Period $period = null, string $path = null): int
    {
        if (is_null($period)) {
            $period = Period::minutes(30);
        }

        $googleAnalytics = $this->googleAnalytics
            ->setMinuteRange(
                name: null,
                start: 29,
                end: 0,
            )
            ->addMetrics('activeUsers');

        if ($path) {
            $googleAnalytics->addDimension('unifiedScreenName');
        }

        $result = $this->getRealtimeReport($googleAnalytics)
            ->dataTable;

        return $result;
        // return (int) Arr::first(Arr::flatten($result));
    }
}
