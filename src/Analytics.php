<?php

namespace Vormkracht10\Analytics;

use Google\Analytics\Data\V1beta\BetaAnalyticsDataClient;
use Vormkracht10\Analytics\Service\GoogleAnalyticsService;
use Vormkracht10\Analytics\Traits\Analytics\DemographicAnalytics;
use Vormkracht10\Analytics\Traits\Analytics\DevicesAnalytics;
use Vormkracht10\Analytics\Traits\Analytics\RealtimeAnalytics;
use Vormkracht10\Analytics\Traits\Analytics\ResourceAnalytics;
use Vormkracht10\Analytics\Traits\Analytics\SessionsAnalytics;
use Vormkracht10\Analytics\Traits\Analytics\UsersAnalytics;
use Vormkracht10\Analytics\Traits\Analytics\ViewsAnalytics;
use Vormkracht10\Analytics\Traits\ResponseFormatterTrait;

class Analytics
{
    use ResponseFormatterTrait,
        ViewsAnalytics,
        SessionsAnalytics,
        UsersAnalytics,
        DevicesAnalytics,
        DemographicAnalytics,
        ResourceAnalytics,
        RealtimeAnalytics;

    public ?int $propertyId = null;

    public ?string $credentials = null;

    public GoogleAnalyticsService $googleAnalytics;

    public function __construct(int $propertyId = null)
    {
        $this->googleAnalytics = new GoogleAnalyticsService();
        $this->propertyId = $propertyId ?? config('google-analytics.property_id') ?? null;
        $this->credentials = config('google-analytics.credentials') ?? null;
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

    public function getReport(GoogleAnalyticsService $googleAnalytics): AnalyticsResponse
    {
        $client = $this->getClient();

        $response = $client->runReport([
            'property' => 'properties/'.$this->getPropertyId(),
            'dateRanges' => $googleAnalytics->dateRanges,
            'dimensions' => $googleAnalytics->dimensions,
            'metrics' => $googleAnalytics->metrics,
            'orderBys' => $googleAnalytics->orderBys,
            'metricAggregations' => $googleAnalytics->metricAggregations,
            'dimensionFilter' => $googleAnalytics->dimensionFilter,
            'metricFilter' => $googleAnalytics->metricFilter,
            'limit' => $googleAnalytics->limit,
            'offset' => $googleAnalytics->offset,
            'keepEmptyRows' => $googleAnalytics->keepEmptyRows,
        ]);

        return $this->formatResponse($response);
    }
}
