<?php

namespace Vormkracht10\Analytics\Traits;

use Google\Analytics\Data\V1beta\RunReportResponse;
use Vormkracht10\Analytics\AnalyticsResponse;

trait ResponseFormatterTrait
{
    public array $metricHeaders = [];

    public array $dimensionHeaders = [];

    public function formatResponse(RunReportResponse $response): AnalyticsResponse
    {
        $this->setDimensionAndMetricHeaders($response);

        return (new AnalyticsResponse())
            ->setResponse($response)
            ->setDataTable($this->getTable($response))
            ->setMetricAggregationsTable($this->getMetricAggregationsTable($response));
    }

    private function setDimensionAndMetricHeaders(RunReportResponse $response): void
    {
        foreach ($response->getDimensionHeaders() as $dimensionHeader) {
            $this->dimensionHeaders[] = $dimensionHeader->getName();
        }

        foreach ($response->getMetricHeaders() as $metricHeader) {
            $this->metricHeaders[] = $metricHeader->getName();
        }
    }

    private function getTable(RunReportResponse $response): array
    {
        $table = [];

        foreach ($response->getRows() as $row) {
            $arr = [];

            foreach ($row->getDimensionValues() as $key => $item) {
                $arr[$this->dimensionHeaders[$key]] = $item->getValue();
            }

            foreach ($row->getMetricValues() as $key => $item) {
                $arr[$this->metricHeaders[$key]] = $item->getValue();
            }

            $table[] = $arr;
        }

        return $table;
    }

    private function getMetricAggregationsTable(RunReportResponse $response): array
    {
        $table = [];

        $aggregationMethods = [
            'getTotals',
            'getMaximums',
            'getMinimums',
        ];

        foreach ($aggregationMethods as $aggregationMethod) {
            foreach ($response->{$aggregationMethod}() as $row) {
                if ($row->getMetricValues()->count()) {
                    $arr = [];
                    foreach ($row->getDimensionValues() as $key => $item) {
                        $arr[$key === 0 ? 'aggregation' : $this->dimensionHeaders[$key]] = $item->getValue();
                    }
                    foreach ($row->getMetricValues() as $key => $item) {
                        $arr[$this->metricHeaders[$key]] = $item->getValue();
                    }
                    $output[] = $arr;
                }
            }
        }

        return $table;
    }
}
