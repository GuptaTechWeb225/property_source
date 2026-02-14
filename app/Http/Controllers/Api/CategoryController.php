<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Traits\ApiReturnFormatTrait;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    use ApiReturnFormatTrait;
    public function list(){
      $expenseCategory= Category::where('type', 'expense')->get();
      $incomeCategory= Category::where('type', 'income')->get();
      $data['messages'] = "Income/Expense List";

        $data['Expense List'] = CategoryResource::collection($expenseCategory);
        $data['Income List'] = CategoryResource::collection($incomeCategory);
        return $this->responseWithSuccess($data['messages'], $data, 200);


    }
}
