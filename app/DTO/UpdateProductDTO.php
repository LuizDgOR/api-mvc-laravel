<?php

namespace App\DTO;

use App\Http\Requests\StoreUpdateProduct;

class UpdateProductDTO
{
    public function __construct(
        public string $id,
        public string $name,
        public string $description,
        public string $price,
    ){}

    public static function makeFromRequest(StoreUpdateProduct $request, string $id = null)
    {
        return new self(
            $id ?? $request->id,
            $request->name,
            $request->description,
            $request->price,
        );
    }
}
