<?php

namespace App\DTO;

use App\Http\Requests\StoreCategoryRequest;

class CreateCategoryDTO
{
    public function __construct(
        public string $name,
        public string $description,
    ){}

    public static function makeFromRequest(StoreCategoryRequest $request): self
    {
        return new self(
            $request->name,
            $request->description,
        );
    }
}