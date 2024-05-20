<?php

declare(strict_types=1);

namespace App\Domains\Post\Requests\Post;

use App\Domains\Post\Core\DTO\FormRequest\Post\UpdateRequestDTO;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateRequest
 */
final class UpdateRequest extends FormRequest
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
     * @return \App\Domains\Post\Core\DTO\FormRequest\Post\UpdateRequestDTO
     */
    public function getDto(): UpdateRequestDTO
    {
        $title = $this->validated('title');
        $body  = $this->validated('body');

        return new UpdateRequestDTO($title, $body);
    }
}
