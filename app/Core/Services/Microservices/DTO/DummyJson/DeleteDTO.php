<?php

declare(strict_types=1);

namespace App\Core\Services\Microservices\DTO\DummyJson;

/**
 * Class DeleteDTO
 */
final readonly class DeleteDTO
{
    /**
     * @param int $postId
     */
    public function __construct(
        public int $postId
    ) {
    }
}