<?php

namespace App\Http\Controllers\Store;

use App\DTO\UpdateProductDTO;
use App\DTO\CreateProductDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateProduct;
use App\Models\Product;
use App\Services\CategoryService;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(
        protected ProductService $productService,
        protected CategoryService $categoryService,
    ){}

    public function index(Request $request)
    {
        $products = $this->productService->paginate(
            $request->filter,
            $request->get('page', 1),
            $request->get('per_page', 1)

        );

        $filter = ['filter' => $request->get('filter', '')];

        return view('store.product.index', compact('products', 'filter'));
    }

    public function create()
    {   
        $categories = $this->categoryService->getAll();
        return view('store.product.create', compact('categories'));
    }

    public function store(StoreUpdateProduct $request)
    {
        //pega somente os dados validados
        // $data = $request->validated();
        // $product = $product->create($data);
        $this->productService->new(
            CreateProductDTO::makeFromRequest($request)
        );
        return redirect()->route('store.products.index');
    }

    // definindo o tipo string ou int
    public function show( string $id)
    {
        //posso pegar com o where
        // Product::where('id', '=', $id)->first();
        if(!$product = $this->productService->findOne($id)){
            return redirect()->back();
        }
        return view('store.product.show', compact('product'));
    }

    public function edit(string $id){

        // if(!$product = $product->where('id', $id)->first()){
        //     return redirect()->back();
        // }
        if(!$product = $this->productService->findOne($id)){
            return redirect()->back();
        }
        return view('store.product.edit', compact('product'));
    }

    public function update(StoreUpdateProduct $request, Product $product, string $id){

        // if(!$product = $product->find($id)){
        //     return back();
        // }
        // // $product->update($request->only([
        // //     'name', 'description'
        // // ]));
        // $product->update($request->validated());

        $product = $this->productService->update(UpdateProductDTO::makeFromRequest($request));
        if(!$product){
            return back();
        }
        return redirect()->route('index.store.products');
    }

    public function destroy(string $id){

        $this->productService->delete($id);
        return redirect()->route('index.store.products');
    }
}
