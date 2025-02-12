<?php

namespace App\Http\Controllers\Store;

use App\DTO\CreateCategoryDTO;
use App\DTO\UpdateCategoryDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UptadeCategoryRequest;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{   
    /**
     * Summary of __construct
     * @param \App\Services\CategoryService $service
     */
    public function __construct(
        protected CategoryService $service
    ){}
    
    /**
     * Summary of index
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $categories = $this->service->getAll($request->filter);
        return view('store.category.index', compact('categories'));
    }

    /**
     * Summary of create
     * @return \Illuminate\Contracts\View\View
     */
    public function create(){
        return view('store.category.create');
    }

    /**
     * Summary of store
     * @param \App\Http\Requests\StoreCategoryRequest $request
     * @return mixed|\Illuminate\Http\RedirectResponse
     */
    public function store(StoreCategoryRequest $request)
    {   
        
        $this->service->create(
            CreateCategoryDTO::makeFromRequest($request)
        );
        return redirect()->back();
    }

    /**
     * Summary of edit
     * @param mixed $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {   
        $category = $this->service->getById($id);
        return view('store.category.edit', compact('category'));
    }
    
    /**
     * Summary of update
     * @param \App\Http\Requests\UptadeCategoryRequest $request
     * @return mixed|\Illuminate\Http\RedirectResponse
     */
    public function update(UptadeCategoryRequest $request)
    {   
        $this->service->update(
            UpdateCategoryDTO::makeFromRequest($request)
        );

        return redirect()->back();
    }

    /**
     * Summary of show
     * @param mixed $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {   
        $category = $this->service->getById($id);
        return view('store.category.show', compact('category'));
    }

    /**
     * Summary of delete
     * @param mixed $id
     * @return mixed|\Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $this->service->delete($id);
        return redirect()->back();
    }
}