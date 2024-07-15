<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use App\Models\products;
use App\Models\transaction;
use App\Services\CategoryService;
use App\Services\ProductServicesInterface;
use App\Services\SubCategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class FontendController extends Controller
{
    protected $productServices;
    protected $categoryServices;
    protected $subCategoryServices;

    public function __construct(ProductServicesInterface $productServices ,CategoryService $categoryServices, SubCategoryService $subCategoryServices)
    {
        $this->productServices = $productServices;
        $this->categoryServices = $categoryServices;
        $this->subCategoryServices = $subCategoryServices;
    }
    public function indexs(Request $request){
     $serch=$request->search;
     $perpage=5;
    $products =$this->productServices->withProductSubCategory($perpage,$serch);
        
        return view('fontend.HomePage.index',compact('products'));
    }

    public function purchase(Request $request){
        $request->validate([
            'product'=>'required'
        ]);
       
      $product = products::find($request->product);
       
      if($product!=null){
          $transaction = new transaction();
          $transaction->user_id = Auth::id();
          $transaction->amount = $product->price;
          $transaction->currency = 'USD';
          $transaction->created_at = Carbon::now();
          $transaction->save();
          return redirect()->back()->with('success','Product Purchased Successfully');
      }else{
            return redirect()->back()->with('error','Product Not Found');
      }
    }

    public function transaction(Request $request){
        $search = $request->input('search');
        $perPage = 5; 

        if (auth()->user()->role == 'admin') {
            $transactions = Transaction::with('user')
                ->where(function ($query) use ($search) {
                    if ($search) {
                        $query->where('amount', 'like', "%$search%");
                        
                    }
                })
                ->paginate($perPage);
        } else {
            $transactions = Transaction::where('user_id', auth()->id())
                ->where(function ($query) use ($search) {
                    if ($search) {
                        $query->where('amount', 'like', "%$search%");
                         
                    }
                })
                ->with('user')
                ->paginate($perPage);
        }

        return view('fontend.transaction.index', compact('transactions'));
    }
  

}
