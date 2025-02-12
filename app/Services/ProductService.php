<?php

namespace App\Services;

use App\DTO\UpdateProductDTO;
use App\DTO\CreateProductDTO;
use App\Repositories\PaginationInterface;
use App\Repositories\ProductRepositoryInterface;
use stdClass;

//lógica fica aqui
class ProductService
{

    public function __construct(
        protected ProductRepositoryInterface $repositoryProduct,
    ){}

    public function getAll(string $filter = null): array
    {
        return $this->repositoryProduct->getAll($filter);
    }

    public function paginate(string $filter = null, int $page = 1 , int $totalPerPage = 15): PaginationInterface
    {
        return $this->repositoryProduct->paginate($filter, $page, $totalPerPage);
    }

    public function findOne(string $id): stdClass|null
    {
        return $this->repositoryProduct->findOne($id);
    }

    public function delete(string $id):void
    {
        $this->repositoryProduct->delete($id);
    }

    public function new(CreateProductDTO $dto):stdClass
    {   
        return $this->repositoryProduct->new($dto);
    }

    public function update(UpdateProductDTO $dto):stdClass|null
    {
        return $this->repositoryProduct->update($dto);
    }
}
