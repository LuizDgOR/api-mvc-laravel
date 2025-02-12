<?php

namespace App\Http\Controllers\Api;

use App\Adapters\ApiAdapter;
use App\DTO\CreateProductDTO;
use App\DTO\UpdateProductDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateProduct;
use App\Http\Resources\ProductResource;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ApiProductController extends Controller
{   
    public function __construct(
        protected ProductService $productService,
    ){}
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $products = $this->productService->paginate(
            $request->filter,
            $request->get('page', 1),
            $request->get('per_page', 10)

        );

        return ApiAdapter::toJson($products);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateProduct $request)
    {
        $product = $this->productService->new(
            CreateProductDTO::makeFromRequest($request)
        );

        return new ProductResource($product);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {   
        if(!$product = $this->productService->findOne($id)){
            return response()->json(["error"=> "Not Found"], Response::HTTP_NOT_FOUND);
        }
        return new ProductResource($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateProduct $request, string $id)
    {
        $product = $this->productService->update(UpdateProductDTO::makeFromRequest($request, $id));
        
        if(!$product){
            return response()->json([
                'error' => 'Not Foud'
            ], Response::HTTP_NOT_FOUND
        );
        }
        return new ProductResource($product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(!$this->productService->findOne($id)){
            return response()->json(["error"=> "Not Found"], Response::HTTP_NOT_FOUND);
        }

        $this->productService->delete($id);

        return response()->json(["error"=> "No Content"], Response::HTTP_NO_CONTENT);
    }
}
