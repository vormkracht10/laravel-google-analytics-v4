<?php

namespace Vormkracht10\Analytics\Exceptions;

use DateTimeInterface;
use Exception;

class InvalidPeriod extends Exception
{
    public static function startDateCannotBeGreaterThanEndDate(DateTimeInterface $start, DateTimeInterface $end): self
    {
        return new self("Start date [{$start->format('Y-m-d')}] cannot be greater than end date [{$end->format('Y-m-d')}].");
    }
}
