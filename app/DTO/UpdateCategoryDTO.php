<?php
namespace App\DTO;
use App\Http\Requests\UptadeCategoryRequest;
class UpdateCategoryDTO
{
    public function __construct(
        public int $id,
        public string $name,
        public string $description,
    ){}

    public static function makeFromRequest(UptadeCategoryRequest $request):self 
    {
        return new self(
            $request->id,
            $request->name,
            $request->description,
        );
    }
}