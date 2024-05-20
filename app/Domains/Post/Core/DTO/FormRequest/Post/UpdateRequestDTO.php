<?php

declare(strict_types=1);

namespace App\Domains\Post\Core\DTO\FormRequest\Post;

/**
 * Class UpdateRequestDTO
 */
final readonly class UpdateRequestDTO
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
