<?php

declare(strict_types=1);

namespace App\Core\Services\Microservices\DTO\DummyJson;

/**
 * Class CreateDTO
 */
final readonly class CreateDTO
{
    /**
     * @param string $title
     * @param string $body
     * @param int    $userId
     */
    public function __construct(
        public string $title,
        public string $body,
        public int    $userId
    ) {
    }
}