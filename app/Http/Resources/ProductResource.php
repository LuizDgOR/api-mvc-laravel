<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        // posso formatar data e nome dos dados
        return [
            'id'=> $this->id,
            'name'=> $this->name,
            'description'=> $this->description,
            'price'=> $this->price,
            'category_id'=> $this->category_id,
            'dt_created'=>$this->created_at,
            'dt_uptede'=> $this->updated_at,
        ];
    }
}
