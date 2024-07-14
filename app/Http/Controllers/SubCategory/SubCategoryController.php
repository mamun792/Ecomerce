<?php

namespace App\Http\Controllers\SubCategory;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategoryRequest\SubCategoryRequest;
use App\Models\Categories;
use App\Repositories\SubCategoryRepository;
use App\Repositories\SubCategoryRepositoryInterface;
use App\Services\SubCategoryService;
use App\Services\SubCategoryServiceInterface;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{

    protected $subCategoryService;

    public function __construct(SubCategoryService $subCategoryService)
    {
        $this->subCategoryService = $subCategoryService;
    }
    public function index()
    {
       
        return view('admin.subcategory.index');
    }

    public function create()
    {
        $categories=Categories::all();
        return view('admin.subcategory.create',compact('categories'));
    }

    public function store(SubCategoryRequest $request)
    {
      $validated = $request->validated();
       $this->subCategoryService->store($validated);
        return back()->with('success', 'Sub Category Created Successfully');
    }
}
