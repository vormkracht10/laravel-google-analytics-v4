<?php

namespace Vormkracht10\Analytics\Traits;

use Google\Analytics\Data\V1beta\OrderBy;
use Google\Analytics\Data\V1beta\OrderBy\DimensionOrderBy;
use Google\Analytics\Data\V1beta\OrderBy\MetricOrderBy;

trait OrderByTrait
{
    public array $orderBys = [];

    public function orderByDimension(string $name, string $direction = 'ASC'): self
    {
        $dimension = new DimensionOrderBy([
            'dimension_name' => $name,
        ]);

        $this->orderBys = [
            (new OrderBy([
                'dimension' => $dimension,
            ]))->setDesc($direction === 'DESC'),
        ];

        return $this;
    }

    public function orderByMetric(string $name, string $direction = 'ASC'): self
    {
        $metric = new MetricOrderBy([
            'metric_name' => $name,
        ]);

        $this->orderBys = [
            (new OrderBy([
                'metric' => $metric,
            ]))->setDesc($direction === 'DESC'),
        ];

        return $this;
    }
}
