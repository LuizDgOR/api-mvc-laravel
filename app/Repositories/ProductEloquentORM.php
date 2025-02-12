<?php
namespace App\Repositories;

use App\Repositories\ProductRepositoryInterface;
use App\DTO\UpdateProductDTO;
use App\DTO\CreateProductDTO;
use App\Models\Product;
use stdClass;

//Querys complexas ficam aqui
class ProductEloquentORM implements ProductRepositoryInterface
{
    public function __construct(
        protected Product $model
    ){}
            
    public function getAll(string $filter = null):array
    {
        return $this->model
                    ->with(['category:id,name'])
                    ->where(function($query)use($filter){
                        if($filter){
                            $query->where('name', $filter);
                            $query->where('description', 'like', "%{$filter}%");
                        }
                    })
                    ->get()
                    ->toArray();
    }

    public function findOne(string $id):stdClass|null
    {
        $product = $this->model->find($id);
        if(!$product){
            return null;
        }
        return (object) $product->toArray();
    }

    public function delete(string $id): void
    {
        $this->model->findOrFail($id)->delete();
    }

    public function new(CreateProductDTO $dto): stdClass
    {   
        $product = $this->model->create(
            (array) $dto
        );
        return (object) $product->toArray();
    }

    public function update(UpdateProductDTO $dto): stdClass|null
    {
        if(!$product = $this->model->find($dto->id)){
            return null;
        }
        $product->update(
            (array) $dto
        );

        return (object) $product->toArray();
    }

    public function paginate(string|null $filter = null, int $page = 1, int $totalPerPage = 15): PaginationInterface
    {
        $result = $this->model
                    ->with(['category:id,name'])
                    ->where(function($query)use($filter){
                        if($filter){
                            $query->where('name', $filter);
                            $query->where('description', 'like', "%{$filter}%");
                        }
                    })
                    ->paginate($totalPerPage, ['*'], 'page', $page);
        return new PaginationPresenter($result);
    }
}
