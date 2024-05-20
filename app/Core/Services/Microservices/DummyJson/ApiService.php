<?php

declare(strict_types=1);

namespace App\Core\Services\Microservices\DummyJson;

use App\Core\Contracts\Services\Microservices\DummyJson\ApiService as DummyJsonApiContract;
use App\Core\Services\Microservices\ApiService as BaseApiService;
use App\Core\Services\Microservices\DTO\DummyJson\CreateDTO;
use App\Core\Services\Microservices\DTO\DummyJson\GetDTO;
use App\Core\Services\Microservices\DTO\DummyJson\UpdateDTO;
use App\Core\Services\Microservices\DTO\DummyJson\DeleteDTO;
use Illuminate\Support\Facades\Log;
use RuntimeException;
use Throwable;

/**
 * Class DummyJson api service
 */
final class ApiService extends BaseApiService implements DummyJsonApiContract
{
    /**
     * @return string
     */
    public function basePath(): string
    {
        return '/posts';
    }

    /**
     * @param \App\Core\Services\Microservices\DTO\DummyJson\GetDTO $dto
     *
     * @return array
     */
    public function get(GetDTO $dto): array
    {
        try {
            $response = $this->client->get($this->getUrl(sprintf('/%s', $dto->postId)));

            return json_decode($response->body(), true);
        } catch (Throwable $exception) {
            Log::error('Failed to get dummy json data', [
                'exception' => $exception->getMessage(),
                'user_id'   => $dto->postId,
            ]);

            throw new RuntimeException('Service error');
        }
    }

    public function create(CreateDTO $dto): array
    {
        $payload = [
            'title'  => $dto->title,
            'userId' => $dto->userId,
            'body'   => $dto->body,
        ];

        try {
            $response = $this->client->post($this->getUrl('/add'), $payload);

            return json_decode($response->body(), true);
        } catch (Throwable $exception) {
            Log::error('Failed to create dummy json data', [
                'exception' => $exception->getMessage(),
                'user_id'   => $dto->userId,
            ]);

            throw new RuntimeException('Service error');
        }
    }

    public function update(UpdateDTO $dto): array
    {
        $payload = [
            'title' => $dto->title,
            'body'  => $dto->body,
        ];

        try {
            $response = $this->client->put($this->getUrl(sprintf('/%s', $dto->postId)), $payload);

            return json_decode($response->body(), true);
        } catch (Throwable $exception) {
            Log::error('Failed to update dummy json data', [
                'exception' => $exception->getMessage(),
                'post_id'   => $dto->postId,
            ]);

            throw new RuntimeException('Service error');
        }
    }

    /**
     * @param \App\Core\Services\Microservices\DTO\DummyJson\DeleteDTO $dto
     *
     * @return array
     */
    public function delete(DeleteDTO $dto): array
    {
        try {
            $response = $this->client->delete($this->getUrl((string)$dto->postId));

            return json_decode($response->body(), true);
        } catch (Throwable $exception) {
            Log::error('Failed to delete dummy json data', [
                'exception' => $exception->getMessage(),
                'post_id'   => $dto->postId,
            ]);

            throw new RuntimeException('Service error');
        }
    }
}