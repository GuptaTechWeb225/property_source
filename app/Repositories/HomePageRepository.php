<?php

namespace App\Repositories;

use Carbon\Carbon;
use App\Traits\CommonHelperTrait;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\HomePageInterface;
use App\Models\HomePage;

//use Your Model

/**
 * Class HowItWorkRepository.
 */
class HomePageRepository implements HomePageInterface
{
    use CommonHelperTrait;
    private HomePage $model;

    public function __construct(HomePage $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        return HomePage::first();
    }

    public function update($request)
    {
        try {
            $homeTitleUpdate                                = $this->model->first();
            $homeTitleUpdate->business_model_title          = $request->business_model_title;
            $homeTitleUpdate->business_model_description    = $request->business_model_description;
            $homeTitleUpdate->business_model_link           = $request->business_model_link;
            $homeTitleUpdate->feature_title                 = $request->feature_title;
            $homeTitleUpdate->feature_description           = $request->feature_description;
            $homeTitleUpdate->howitworks_title              = $request->howitworks_title;
            $homeTitleUpdate->howitworks_description        = $request->howitworks_description;
            $homeTitleUpdate->app_store_link                = $request->app_store_link;
            $homeTitleUpdate->play_store_link               = $request->play_store_link;
            $homeTitleUpdate->testimonial_title             = $request->testimonial_title;
            $homeTitleUpdate->testimonial_description       = $request->testimonial_description;
            $homeTitleUpdate->blogs_title                   = $request->blogs_title;
            $homeTitleUpdate->blogs_description             = $request->blogs_description;
            $homeTitleUpdate->save();

            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }


}