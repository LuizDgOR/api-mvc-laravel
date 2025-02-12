<?php

namespace App\DTO;

use App\Http\Requests\StoreUpdateProduct;

class CreateProductDTO
{
    public function __construct(
        public string $name,
        public string $description,
        public string $price,
        public int $category_id,
    ){}
        
    /**
     * Recebe um request e cria seu proprio objeto
     */
    public static function makeFromRequest(StoreUpdateProduct $request): self
    {
        return new self(
            $request->name,
            $request->description,
            $request->price,
            $request->category_id,
        );
    }

}
