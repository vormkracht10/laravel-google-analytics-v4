<?php

namespace Vormkracht10\Analytics\Traits\Entities;

use Illuminate\Support\Arr;
use Vormkracht10\Analytics\Period;

trait Users
{
    /**
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function getTotalUsers(Period $period): int
    {
        $result = $this->setDateRange($period)
            ->addMetrics('totalUsers')
            ->getReport()
            ->dataTable;

        return (int) Arr::first(Arr::flatten($result));
    }
}
