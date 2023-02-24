<?php

namespace Vormkracht10\Analytics\Traits\Analytics;

use Vormkracht10\Analytics\Enums\Direction;
use Vormkracht10\Analytics\Period;

trait ResourceAnalytics
{
    // Gett all traffic sources (organic, direct, referral, social, email)
    public function getTrafficSources(Period $period): array
    {
        $googleAnalytics = $this->googleAnalytics
            ->setDateRange($period)
            ->addMetrics('sessions')
            ->addDimensions('sessionSource')
            ->orderByMetric('sessions', Direction::DESC);

        return $this->getReport($googleAnalytics)
            ->dataTable;
    }


    public function getTopReferrers($days = 365, $maxResults = 10, $filters = [])
    {
        $data = [];

        [$startDate, $endDate] = $this->getStartEndDate($days);

        $params = [
            'dimensions' => 'ga:fullReferrer',
            'sort' => '-ga:sessions',
            'max-results' => $maxResults,
        ];

        if ($filters) {
            $params['filters'] = $filters;
        }

        $query = $this->performQuery($startDate, $endDate, 'ga:sessions', $params);

        if ($query->rows) {
            foreach ($query->rows as $row) {
                $data[] = [
                    'url' => rtrim($row[0], '/'),
                    'sessions' => $row[1],
                ];
            }
        }

        return collect($data);
    }

     public function getLandingPages($days = 30, $maxResults = 10)
    {
        $data = [];
        $total = 0;

        [$startDate, $endDate] = $this->getStartEndDate($days);

        $params = [
            'dimensions' => 'ga:landingPagePath',
            'sort' => '-ga:pageviews',
            'filters' => 'ga:landingPagePath!=/',
            'max-results' => $maxResults,
        ];

        $query = $this->performQuery($startDate, $endDate, 'ga:pageviews', $params);

        if ($query->rows) {
            foreach ($query->rows as $row) {
                $data[] = [
                    'path' => '/'.ltrim($row[0], '/'),
                    'pageviews' => $row[1],
                ];

                $total += $row[1];
            }

            foreach ($data as $i => $row) {
                $data[$i]['percent'] = round($row['pageviews'] / $total * 100, 0);
            }
        }

        return collect($data);
    }

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
