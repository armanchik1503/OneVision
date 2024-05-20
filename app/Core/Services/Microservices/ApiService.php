<?php

declare(strict_types=1);

namespace App\Core\Services\Microservices;

use Illuminate\Http\Client\PendingRequest;

/**
 * Class ApiService
 */
abstract class ApiService
{
    /**
     * @param \Illuminate\Http\Client\PendingRequest $client
     * @param string                                 $host
     */
    public function __construct(
        protected readonly PendingRequest $client,
        protected readonly string         $host
    ) {
    }

    /**
     * @param string $path
     *
     * @return string
     */
    protected function getUrl(string $path): string
    {
        return sprintf('%s%s%s', $this->host, $this->basePath(), $path);
    }

    /**
     * @return string
     */
    abstract public function basePath(): string;
}
