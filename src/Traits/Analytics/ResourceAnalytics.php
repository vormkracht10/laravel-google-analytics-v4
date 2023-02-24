<?php

namespace Vormkracht10\Analytics\Traits\Analytics;

use Vormkracht10\Analytics\Enums\Direction;
use Vormkracht10\Analytics\Period;

trait ResourceAnalytics
{
    public function getTopReferrers(Period $period, int $limit): array
    {
        $googleAnalytics = $this->googleAnalytics
            ->setDateRange($period)
            ->addMetrics('sessions')
            ->addDimensions('pageReferrer')
            ->orderByMetric('sessions', Direction::DESC)
            ->limit($limit);

        return $this->getReport($googleAnalytics)
            ->dataTable;
    }

    public function getLandingPages(Period $period, int $limit): array
    {
        $googleAnalytics = $this->googleAnalytics
            ->setDateRange($period)
            ->addMetrics('sessions')
            ->addDimensions('landingPagePath')
            ->orderByMetric('sessions', Direction::DESC)
            ->limit($limit);

        return $this->getReport($googleAnalytics)
            ->dataTable;
    }


    //  public function getLandingPages($days = 30, $maxResults = 10)
    // {
    //     $data = [];
    //     $total = 0;

    //     [$startDate, $endDate] = $this->getStartEndDate($days);

    //     $params = [
    //         'dimensions' => 'ga:landingPagePath',
    //         'sort' => '-ga:pageviews',
    //         'filters' => 'ga:landingPagePath!=/',
    //         'max-results' => $maxResults,
    //     ];

    //     $query = $this->performQuery($startDate, $endDate, 'ga:pageviews', $params);

    //     if ($query->rows) {
    //         foreach ($query->rows as $row) {
    //             $data[] = [
    //                 'path' => '/'.ltrim($row[0], '/'),
    //                 'pageviews' => $row[1],
    //             ];

    //             $total += $row[1];
    //         }

    //         foreach ($data as $i => $row) {
    //             $data[$i]['percent'] = round($row['pageviews'] / $total * 100, 0);
    //         }
    //     }

    //     return collect($data);
    // }

    public function getExitPages($days = 30, $maxResults = 10)
    {
        $data = [];
        $total = 0;

        [$startDate, $endDate] = $this->getStartEndDate($days);

        $params = [
            'dimensions' => 'ga:exitPagePath,ga:pageTitle',
            'sort' => '-ga:pageviews',
            'filters' => 'ga:exitPagePath!=/',
            'max-results' => $maxResults,
        ];

        $query = $this->performQuery($startDate, $endDate, 'ga:pageviews', $params);

        if ($query->rows) {
            foreach ($query->rows as $row) {
                $data[] = [
                    'path' => '/'.ltrim($row[0], '/'),
                    'title' => $row[1],
                    'pageviews' => $row[2],
                ];

                $total += $row[2];
            }

            foreach ($data as $i => $row) {
                $data[$i]['percent'] = round($row['pageviews'] / $total * 100, 0);
            }
        }

        return collect($data);
    }
}
