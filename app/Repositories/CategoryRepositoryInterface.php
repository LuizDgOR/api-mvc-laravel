<?php

namespace App\Repositories;
use App\DTO\CreateCategoryDTO;
use App\DTO\UpdateCategoryDTO;
use App\Models\Category;
use stdClass;
interface CategoryRepositoryInterface
{   
    /**
     * criar um produto a partir de um DTO
     * @param \App\DTO\CreateCategoryDTO $dto
     * @return \stdClass
     */
    public function create(CreateCategoryDTO $dto): stdClass;

    /**
     * Busca todos os registros
     * @param string $filter
     * @return array
     */
    public function getAll(string $filter=null):array|null;

    /**
     * Busca somente um por id
     * @param int $id
     * @return \stdClass
     */
    public function getById(int $id):Category|null;

    /**
     * Atualiza um registro
     * @param \App\DTO\UpdateCategoryDTO $dto
     * @return \stdClass|null
     */
    public function update(UpdateCategoryDTO $dto):stdClass|null;

    /**
     * Deleta um registro
     * @param int $id
     * @return void
     */
    public function delete(int $id):void;
}