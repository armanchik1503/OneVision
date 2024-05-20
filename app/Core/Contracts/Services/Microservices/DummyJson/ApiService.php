<?php

declare(strict_types=1);

namespace App\Core\Contracts\Services\Microservices\DummyJson;

use App\Core\Services\Microservices\DTO\DummyJson\CreateDTO;
use App\Core\Services\Microservices\DTO\DummyJson\GetDTO;
use App\Core\Services\Microservices\DTO\DummyJson\UpdateDTO;
use App\Core\Services\Microservices\DTO\DummyJson\DeleteDTO;

/**
 * Class ApiService
 */
interface ApiService
{
    /**
     * @param \App\Core\Services\Microservices\DTO\DummyJson\GetDTO $dto
     *
     * @return array
     */
    public function get(GetDTO $dto): array;

    /**
     * @param \App\Core\Services\Microservices\DTO\DummyJson\CreateDTO $dto
     *
     * @return array
     */
    public function create(CreateDTO $dto): array;

    /**
     * @param \App\Core\Services\Microservices\DTO\DummyJson\UpdateDTO $dto
     *
     * @return array
     */
    public function update(UpdateDTO $dto): array;

    /**
     * @param \App\Core\Services\Microservices\DTO\DummyJson\DeleteDTO $dto
     *
     * @return array
     */
    public function delete(DeleteDTO $dto): array;
}