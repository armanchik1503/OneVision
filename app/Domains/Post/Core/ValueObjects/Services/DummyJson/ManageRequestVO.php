<?php

declare(strict_types=1);

namespace App\Domains\Post\Core\ValueObjects\Services\DummyJson;

use Illuminate\Support\Arr;

/**
 * Class ManageRequestVO
 */
final readonly class ManageRequestVO
{
    /**
     * @param int|null    $id
     * @param string|null $title
     * @param string|null $body
     */
    public function __construct(
        public ?int    $id,
        public ?string $title,
        public ?string $body,
    ) {
    }

    /**
     * @param array $data
     *
     * @return self
     */
    public static function fromArray(array $data): self
    {
        $id = Arr::get($data, 'id');

        return new self(
            $id !== null ? (int)$id : null,
            Arr::get($data, 'title'),
            Arr::get($data, 'body'),
        );
    }
}
