<?php

declare(strict_types=1);

namespace App\Core\Services\Microservices\DTO\DummyJson;

/**
 * Class GetDTO
 */
final readonly class GetDTO
{
    /**
     * @param int $postId
     */
    public function __construct(
        public int $postId
    ) {
    }
}