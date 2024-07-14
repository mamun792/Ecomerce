<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use App\Http\Requests\Category\CategoryRequest;

class CategoryController extends Controller
{
    protected $categoryService;
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }
    

    public function index()
    {
        $categories= $this->categoryService->all(2);
        return view('admin.category.index',compact('categories'));
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
    public function store(CategoryRequest $request)
    {
       
      try{
        $validated = $request->validated();
        $this->categoryService->store($validated);
        return response()->json(['success' => 'Category created successfully'], 200);
      }catch(\Exception $e){
        return response()->json(['error' => $e->getMessage()], 400);
      }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->categoryService->find($id);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $this->categoryService->delete($id);
            return response()->json(['success' => 'Category deleted successfully'], 200);
          }catch(\Exception $e){
            return response()->json(['error' => $e->getMessage()], 400);
          }
    }
}
