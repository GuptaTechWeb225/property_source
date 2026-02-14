<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use App\Http\Requests\FaqRequest;
use App\Interfaces\FqaInterface;
use App\Repositories\FaqRepository;
use Illuminate\Http\Request;

class FaqController extends Controller
{

    protected $faqRepo;

    public function __construct(FqaInterface $faqInterface)
    {
        $this->faqRepo = $faqInterface;
    }


    public function index()
    {
        $data['title'] = _trans('common.Faqs');
        $data['faqs'] = $this->faqRepo->getAll();
        return view('backend.faq.index')->with($data);
    }


    public function create()
    {
        $data['title'] = _trans('common.Faqs');
        $data['serial'] = $this->faqRepo->getAll()->count() + 1;
        return view('backend.faq.create')->with($data);

    }

    public function store(FaqRequest $request)
    {
        try {
            $this->faqRepo->store($request);
            return redirect()->route('faq.index')->with('success', _trans('common.faq_added_successfully'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $data['title'] = _trans('common.Faqs');
        $data['faq'] = $this->faqRepo->show($id);
        return view('backend.faq.edit')->with($data);
    }

    public function update(FaqRequest $request, $id)
    {
        try {
            $this->faqRepo->update($request, $id);
            return redirect()->route('faq.index')->with('success', _trans('common.faq_updated_successfully'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        if ($this->faqRepo->destroy($id)) :
            $success[0] = "Deleted Successfully";
            $success[1] = "Success";
            $success[2] = "Deleted";
        else :
            $success[0] = "Something went wrong, please try again.";
            $success[1] = 'error';
            $success[2] = "oops";
        endif;
        return response()->json($success);
    }
}
