<?php

namespace App\Repositories;

use App\Interfaces\FqaInterface;
use App\Models\Faq;
use App\Traits\CommonHelperTrait;

/**
 * Class AccountRepository.
 */

class FaqRepository implements FqaInterface
{
    use CommonHelperTrait;

    protected Faq $model;

    public function __construct(Faq $model)
    {
        $this->model = $model;
    }

    public function index($paginate = 10)
    {
        return $this->model->latest('id')->paginate($paginate);
    }


    public function getAll()
    {
        return $this->model->latest()->paginate(10);
    }

    public function store($request)
    {
        try {
            $faq = new $this->model;
            $faq->title = $request->title;
            $faq->description = $request->title;
            $faq->serial =$request->serial;
            $faq->status =$request->status;
            $faq->save();
            return true;
        } catch (\Exception $exception) {
           throw $exception;
        }
    }

    public function show($id)
    {
        return $this->model->find($id);
    }

    public function update($request, $id)
    {
        try {
            $faq = $this->model->find($id);
            $faq->title = $request->title;
            $faq->description = $request->title;
            $faq->serial =$request->serial;
            $faq->status =$request->status;
            $faq->save();
            return true;
        } catch (\Exception $th) {
            return false;
        }
    }

    public function destroy($id)
    {
        try {
            $account = $this->model->findOrFail($id);
            $account->delete();
            return true;
        } catch (\Exception $th) {
            throw $th;
        }
    }
}
