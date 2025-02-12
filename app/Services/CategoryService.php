<?php
namespace App\Services;

use App\DTO\CreateCategoryDTO;
use App\DTO\UpdateCategoryDTO;
use App\Models\Category;
use App\Repositories\CategoryRepository;
use stdClass;

//Feito sem injeção de dependencia 
class CategoryService
{
    public function __construct(
        protected CategoryRepository $repository,
    ){}
    
    /**
     * Summary of getAll
     * @param string $filter
     * @return array
     */
    public function getAll(string $filter = null):array
    {
        return $this->repository->getAll($filter);
    }

    /**
     * Summary of create
     * @param \App\DTO\CreateCategoryDTO $dto
     * @return \stdClass
     */
    public function create(CreateCategoryDTO $dto):stdClass
    {   
        return $this->repository->create($dto);
    }

    /**
     * Summary of getById
     * @param int $id
     * @return \App\Models\Category|null
     */
    public function getById(int $id):Category|null
    {
        return $this->repository->getById($id);
    }

    /**
     * Summary of update
     * @param \App\DTO\UpdateCategoryDTO $dto
     * @return \stdClass|null
     */
    public function update(UpdateCategoryDTO $dto):stdClass|null
    {   
        return $this->repository->update($dto);
    }

    /**
     * Summary of delete
     * @param int $id
     * @return void
     */
    public function delete(int $id): void
    {
        $this->repository->delete($id);
    }

}