<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductRequest;
use App\Models\Categories;
use App\Models\SubCategories;
use App\Services\CategoryService;
use App\Services\ProductServices;
use App\Services\ProductServicesInterface;
use App\Services\SubCategoryService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productServices;
    protected $categoryServices;
    protected $subCategoryServices;

    public function __construct(ProductServicesInterface $productServices
    ,CategoryService $categoryServices, SubCategoryService $subCategoryServices)
    {
        $this->productServices = $productServices;
        $this->categoryServices = $categoryServices;
        $this->subCategoryServices = $subCategoryServices;
    }
    public function index()
    {
        $categories = $this->categoryServices->Allproduct();
        $products= $this->productServices->all(10);
       return view('admin.product.index',compact('categories','products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $validate= $request->validated();
    
        $this->productServices->create($request->all());
         return redirect()->back()->with('success', 'Product created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       
        $this->productServices->update($request->all(),$id);
        return response()->json(['success' => 'Product updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
         $this->productServices->delete($id);
         return response()->json(['success' => 'Product deleted successfully']);
    }
}
