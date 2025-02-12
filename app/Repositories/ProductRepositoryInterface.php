<?php
namespace App\Repositories;

use App\DTO\UpdateProductDTO;
use App\DTO\CreateProductDTO;
use stdClass;

interface ProductRepositoryInterface
{
    /**
     * Retorna todos os produtos
     * @param string $filter
     * @return array
     */
    public function getAll(string $filter = null):array;

    /**
     * Retorna um produto
     * @param string $id
     * @return \stdClass|null
     */
    public function findOne(string $id): stdClass|null;

    /**
     * Deleta um produto
     * @param string $id
     * @return void
     */
    public function delete(string $id): void;

    /**
     * Cria um produto
     * @param \App\DTO\CreateProductDTO $dto
     * @return \stdClass
     */
    public function new(CreateProductDTO $dto): stdClass;

    /**
     * Atualiza um produto
     * @param \App\DTO\UpdateProductDTO $dto
     * @return \stdClass|null
     */
    public function update(UpdateProductDTO $dto): stdClass|null;

    /**
     * Summary of paginate
     * @param string $filter
     * @param int $page
     * @param int $totalPerPage
     * @return array
     */
    public function paginate(string $filter = null, int $page = 1 , int $totalPerPage = 15): PaginationInterface;
}
