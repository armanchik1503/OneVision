<?php

declare(strict_types=1);

namespace App\Core\Traits;

/**
 * Trait HasPagination
 */
trait HasPagination
{
    private const DEFAULT_PER_PAGE = 10;

    private const DEFAULT_PAGE = 1;

    /**
     * @return int
     */
    public function getDefaultPerPage(): int
    {
        return self::DEFAULT_PER_PAGE;
    }

    /**
     * @return int
     */
    public function getDefaultPage(): int
    {
        return self::DEFAULT_PAGE;
    }
}
