<?php

declare(strict_types=1);

namespace App\Core\Services\Microservices\DummyJson;

use App\Core\Contracts\Services\Microservices\DummyJson\ApiService as DummyJsonApiContract;
use App\Core\Services\Microservices\DTO\DummyJson\CreateDTO;
use App\Core\Services\Microservices\DTO\DummyJson\DeleteDTO;
use App\Core\Services\Microservices\DTO\DummyJson\GetDTO;
use App\Core\Services\Microservices\DTO\DummyJson\UpdateDTO;

/**
 * Class MockService
 */
class MockService implements DummyJsonApiContract
{
    /**
     * @param \App\Core\Services\Microservices\DTO\DummyJson\GetDTO $dto
     *
     * @return array
     */
    public function get(GetDTO $dto): array
    {
        return [];
    }

    /**
     * @param \App\Core\Services\Microservices\DTO\DummyJson\CreateDTO $dto
     *
     * @return array
     */
    public function create(CreateDTO $dto): array
    {
        return [];
    }

    /**
     * @param \App\Core\Services\Microservices\DTO\DummyJson\UpdateDTO $dto
     *
     * @return array
     */
    public function update(UpdateDTO $dto): array
    {
        return [];
    }

    /**
     * @param \App\Core\Services\Microservices\DTO\DummyJson\DeleteDTO $dto
     *
     * @return array
     */
    public function delete(DeleteDTO $dto): array
    {
        return [];
    }
}