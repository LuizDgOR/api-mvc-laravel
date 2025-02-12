<?php

namespace App\Repositories;

use App\DTO\CreateCategoryDTO;
use App\DTO\UpdateCategoryDTO;
use App\Models\Category;
use stdClass;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function __construct(
        protected Category $modelCategory
    ){}
    
    /**
     * busca todos os registros
     * @param string $filter
     * @return array
     */
    public function getAll(string $filter = null): array
    {
        return $this->modelCategory
            ->where(function($q) use ($filter){
                                if($filter)
                                    $q->where('name', $filter);
                                    $q->where('description', 'like', "%{$filter}%");
                            }
            )
            ->get()
            ->toArray();
    }

    /**
     * cria uma nova categoria
     * @param \App\DTO\CreateCategoryDTO $dto
     * @return \stdClass
     */
    public function create(CreateCategoryDTO $dto): stdClass
    {   
        $category = $this->modelCategory->create((array) $dto);
        return (object) $category->toArray();
    }
    
    /**
     * Busca por id 
     * @param int $id
     * @return \App\Models\Category|null
     */
    public function getById(int $id): Category|null
    {
        $category = $this->modelCategory->find($id);
        if(!$category){
            return null;
        }
        return $category;
    }

    /**
     * Atualiza um registro
     * @param \App\DTO\UpdateCategoryDTO $dto
     * @return \stdClass|null
     */
    public function update(UpdateCategoryDTO $dto):stdClass|null
    {
        if (!$category = $this->modelCategory->find($dto->id)){
            return null;
        }
        $category->update(
            (array) $dto);
        return (object) $category->toArray();
    }

    /**
     * Deleta um registro
     * @param int $id
     * @return void
     */
    public function delete(int $id):void
    {
        $this->modelCategory->findOrFail($id)->delete();
    }
}