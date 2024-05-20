<?php

declare(strict_types=1);

namespace App\Core\Services\Microservices\DTO\DummyJson;

/**
 * Class GetDTO
 */
final readonly class UpdateDTO
{
    /**
     * @param string $title
     * @param string $body
     * @param int    $postId
     */
    public function __construct(
        public string $title,
        public string $body,
        public int    $postId
    ) {
    }
}