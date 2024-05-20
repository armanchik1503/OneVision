<?php

declare(strict_types=1);

namespace App\Domains\Post\Core\DTO\FormRequest\Post;

/**
 * Class CreateRequestDTO
 */
final readonly class CreateRequestDTO
{
    /**
     * @param string $title
     * @param string $body
     */
    public function __construct(
        public string $title,
        public string $body
    ) {
    }
}
