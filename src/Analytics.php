<?php

namespace Backstage\Analytics;

use Backstage\Analytics\Service\GoogleAnalyticsService;
use Backstage\Analytics\Traits\Analytics\DemographicAnalytics;
use Backstage\Analytics\Traits\Analytics\DevicesAnalytics;
use Backstage\Analytics\Traits\Analytics\RealtimeAnalytics;
use Backstage\Analytics\Traits\Analytics\ResourceAnalytics;
use Backstage\Analytics\Traits\Analytics\SessionsAnalytics;
use Backstage\Analytics\Traits\Analytics\UsersAnalytics;
use Backstage\Analytics\Traits\Analytics\ViewsAnalytics;
use Backstage\Analytics\Traits\ResponseFormatterTrait;
use Google\Analytics\Data\V1beta\Client\BetaAnalyticsDataClient;
use Google\Analytics\Data\V1beta\RunRealtimeReportRequest;
use Google\Analytics\Data\V1beta\RunReportRequest;
use Google\ApiCore\ApiException;
use Google\ApiCore\ValidationException;

class Analytics
{
    use DemographicAnalytics,
        DevicesAnalytics,
        RealtimeAnalytics,
        ResourceAnalytics,
        ResponseFormatterTrait,
        SessionsAnalytics,
        UsersAnalytics,
        ViewsAnalytics;

    public ?int $propertyId = null;

    public ?string $credentials = null;

    public GoogleAnalyticsService $googleAnalytics;

    public function __construct(?int $propertyId = null)
    {
        $this->googleAnalytics = new GoogleAnalyticsService;
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

    /**
     * @throws ValidationException
     */
    public function getClient(): BetaAnalyticsDataClient
    {
        return new BetaAnalyticsDataClient([
            'credentials' => $this->getCredentials(),
        ]);
    }

    /**
     * @throws ValidationException
     * @throws ApiException
     */
    public function getReport(GoogleAnalyticsService $googleAnalytics): AnalyticsResponse
    {
        $client = $this->getClient();

        $response = $client->runReport(new RunReportRequest($this->reportParameters($googleAnalytics)));

        return $this->formatResponse($response);
    }

    /**
     * @throws ValidationException
     * @throws ApiException
     */
    public function getRealtimeReport(GoogleAnalyticsService $googleAnalytics): AnalyticsResponse
    {
        $client = $this->getClient();

        $response = $client->runRealtimeReport(new RunRealtimeReportRequest($this->reportParameters($googleAnalytics)));

        return $this->formatResponse($response);
    }

    /**
     * Build the request parameters using the protobuf field names (snake_case)
     * and drop fields that were never set. The native protobuf extension is
     * strict about both: it rejects camelCase keys ("No such field dateRanges")
     * and null values ("Cannot convert '' to string"), while the pure-PHP
     * implementation silently tolerates them. Fields that do not apply to a
     * given request type stay empty and are filtered out here.
     *
     * @return array<string, mixed>
     */
    protected function reportParameters(GoogleAnalyticsService $googleAnalytics): array
    {
        return array_filter([
            'property' => 'properties/'.$this->getPropertyId(),
            'date_ranges' => $googleAnalytics->dateRanges,
            'minute_ranges' => $googleAnalytics->minuteRanges,
            'dimensions' => $googleAnalytics->dimensions,
            'metrics' => $googleAnalytics->metrics,
            'order_bys' => $googleAnalytics->orderBys,
            'metric_aggregations' => $googleAnalytics->metricAggregations,
            'dimension_filter' => $googleAnalytics->dimensionFilter,
            'metric_filter' => $googleAnalytics->metricFilter,
            'limit' => $googleAnalytics->limit,
            'offset' => $googleAnalytics->offset,
            'keep_empty_rows' => $googleAnalytics->keepEmptyRows,
        ], fn (mixed $value): bool => $value !== null && $value !== []);
    }
}
