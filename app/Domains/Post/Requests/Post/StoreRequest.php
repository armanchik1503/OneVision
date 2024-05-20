<?php

declare(strict_types=1);

namespace App\Domains\Post\Requests\Post;

use App\Domains\Post\Core\DTO\FormRequest\Post\CreateRequestDTO;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreRequest
 */
final class StoreRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'body'  => 'required|string',
        ];
    }

    /**
     * @return \App\Domains\Post\Core\DTO\FormRequest\Post\CreateRequestDTO
     */
    public function getDto(): CreateRequestDTO
    {
        $title = $this->validated('title');
        $body  = $this->validated('body');

        return new CreateRequestDTO($title, $body);
    }
}
