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
    public function get(GetDTO $dto): array
    {
        return [];
    }

    public function create(CreateDTO $dto): array
    {
        return [];
    }

    public function update(UpdateDTO $dto): array
    {
        return [];
    }

    public function delete(DeleteDTO $dto): array
    {
        return [];
    }
}