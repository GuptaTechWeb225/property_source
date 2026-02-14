<?php

namespace App\Repositories;

use App\Interfaces\AccountCategoryInterface;
use App\Models\AccountCategory;
use Illuminate\Support\Facades\DB;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class AccountCategoryRepository.
 */
class AccountCategoryRepository implements AccountCategoryInterface
{
    protected $model;
    public function __construct(AccountCategory $category)
    {
        $this->model = $category;
    }

    public function index($paginate = 10)
    {
       return $this->model->where('user_id', auth()->id())->latest('id')->paginate($paginate);
    }

    public function all()
    {
        return $this->model->where('user_id', auth()->id())->get();
    }

    public function roleBaseList()
    {
        return $this->model->where('created_by', auth()->id())->get();

    }

    public function store($request)
    {
        try {
            DB::beginTransaction();
            $category = new $this->model;
            $category->user_id = auth()->id();
            $category->name = $request->input('name');
            $category->type = $request->input('type');
            $category->status = $request->input('status');
            $category->created_by = auth()->id();
            $category->updated_by = auth()->id();
            $category->save();
            DB::commit();
            return true;
        }catch (\Exception $exception){
            DB::rollBack();
            throw $exception;
        }
    }

    public function show($id)
    {
        return $this->model->find($id);
    }

    public function update($request,$id)
    {
        try {
            DB::beginTransaction();
            $category               = $this->model->findOrFail($id);
            $category->name         = $request->input('name');
            $category->type         = $request->input('type');
            $category->status       = $request->input('status');
            $category->created_by   = auth()->id();
            $category->updated_by   = auth()->id();
            $category->save();
            DB::commit();
            return true;
        }catch (\Exception $exception){
            DB::rollBack();
            throw $exception;
        }
    }

    public function destroy($id)
    {
        try {
            $category = $this->model->find($id);
            if ($category) {
                $category->delete();
                return true;
            }
            return false;
        }catch (\Exception $exception){
            throw $exception;
        }
    }
}
