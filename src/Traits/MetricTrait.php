<?php 

namespace Vormkracht10\Analytics\Traits;

use Google\Analytics\Data\V1beta\Metric;

trait MetricTrait
{
    public array $metrics = [];

    public function addMetric(string $name, string $alias = null): self
    {
        $this->metrics[] = new Metric([
            'name' => $name,
            'alias' => $alias,
        ]);

        return $this;
    }

    public function addMetrics(array $metrics): self
    {
        foreach ($metrics as $metric) {
            $this->addMetric($metric);
        }

        return $this;
    }
}