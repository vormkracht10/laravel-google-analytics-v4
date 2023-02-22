<?php

namespace Vormkracht10\Analytics;

use Google\Analytics\Data\V1beta\BetaAnalyticsDataClient;
use Vormkracht10\Analytics\Traits\MetricTrait;
use Vormkracht10\Analytics\Traits\OrderByTrait;
use Vormkracht10\Analytics\Traits\FilterByTrait;
use Vormkracht10\Analytics\Traits\DateRangeTrait;
use Vormkracht10\Analytics\Traits\DimensionTrait;
use Vormkracht10\Analytics\Traits\MetricAggregationTrait;

class Analytics
{
    use DateRangeTrait,
        MetricTrait,
        DimensionTrait,
        OrderByTrait,
        MetricAggregationTrait,
        FilterByTrait;
        
    public ?int $propertyId = null;

    public ?string $credentials = null;

    public function __construct()
    {
        $this->propertyId = config('google-analytics.property_id') ?? null;
        $this->credentials = config('google-analytics.credentials_json') ?? null;
    }

    public function setPropertyId(int $propertyId): self
    {
        $this->propertyId = $propertyId;

        return $this;
    }

    public function setCredentials(string $credentials): self
    {
        $this->credentials = $credentials;

        return $this;
    }

    public function getCredentials(): ?string
    {
        return $this->credentials;
    }

    public function getPropertyId(): ?int
    {
        return $this->propertyId;
    }

    public function getClient(): BetaAnalyticsDataClient
    {
        return new BetaAnalyticsDataClient([
            'credentials' => $this->getCredentials(),
        ]);
    }

    public function getReport(): array
    {
        $client = $this->getClient();

        $response = $client->runReport([
            'property' => 'properties/'.$this->getPropertyId(),
            'date_ranges' => $this->dateRanges,
            'dimensions' => $this->dimensions,
            'metrics' => $this->metrics,
            'orderBys' => $this->orderBys,
            'metricAggregations' => $this->metricAggregations,
            'dimensionFilter' => $this->dimensionFilter,
            'metricFilter' => $this->metricFilter,
        ]);

        $rows = $response->getRows();

        $result = [];

        foreach ($rows as $row) {
            $result[] = [
                'dimensions' => $row->getDimensions(),
                'metrics' => $row->getMetrics(),
            ];
        }

        return $result;
    }
}
