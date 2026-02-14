<?php

namespace App\Repositories;

use Carbon\Carbon;
use App\Traits\CommonHelperTrait;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\AboutInterface;
use App\Models\About;

//use Your Model

/**
 * Class HowItWorkRepository.
 */
class AboutRepository implements AboutInterface
{
    use CommonHelperTrait;
    private About $model;

    public function __construct(About $model)
    {
        $this->model = $model;
    }

    public function get()
    {
        $data = About::first();

        return $data;

        // [
        //         'id' => $data->id,
        //         'title_one' => $data->title_one,
        //         'subtitle_one' => $data->subtitle_one,
        //         'desc_one' => $data->desc_one,
        //         'image_id_one' => $data->image_id_one,
        //         'title_two' => $data->title_two,
        //         'subtitle_two' => $data->subtitle_two,
        //         'desc_two' => $data->desc_two,
        //         'image_id_two' => $data->image_id_two,
        //         'title_three' => $data->title_three,
        //         'subtitle_three' => $data->subtitle_three,
        //         'desc_three' => $data->desc_three,
        //         'image_id_three' => $data->image_id_three,
        //         'title_four' => $data->title_four,
        //         'subtitle_four' => $data->subtitle_four,
        //         'desc_four' => $data->desc_four,
        //         'image_id_four' => $data->image_id_four,
        //         'title_five' => $data->title_five,
        //         'subtitle_five' => $data->subtitle_five,
        //         'desc_five' => $data->desc_five,
        //         'download_app_link' => $data->download_app_link,
        //         'image_id_five' => $data->image_id_five,
        //     ];
    }

    public function index()
    {

        return About::first();
    }

    public function update($request)
    {
        try {
            $aboutUpdate                                = $this->model->first();
            $aboutUpdate->main_title                     = $request->main_title;
            $aboutUpdate->hero_desc                     = $request->hero_desc;
            $aboutUpdate->title_one                     = $request->title_one;
            $aboutUpdate->subtitle_one                  = $request->subtitle_one;
            $aboutUpdate->desc_one                      = $request->desc_one;
            $aboutUpdate->image_id_one                  = $this->UploadImageUpdate($request->image_id_one, 'backend/uploads/about', $aboutUpdate->image_id_one);
            $aboutUpdate->title_two                     = $request->title_two;
            $aboutUpdate->subtitle_two                  = $request->subtitle_two;
            $aboutUpdate->desc_two                      = $request->desc_two;
            $aboutUpdate->image_id_two                  = $this->UploadImageUpdate($request->image_id_two, 'backend/uploads/about', $aboutUpdate->image_id_two);
            $aboutUpdate->title_three                   = $request->title_three;
            $aboutUpdate->subtitle_three                = $request->subtitle_three;
            $aboutUpdate->desc_three                    = $request->desc_three;
            $aboutUpdate->image_id_three                = $this->UploadImageUpdate($request->image_id_three, 'backend/uploads/about', $aboutUpdate->image_id_three);
            $aboutUpdate->title_four                    = $request->title_four;
            $aboutUpdate->subtitle_four                 = $request->subtitle_four;
            $aboutUpdate->desc_four                     = $request->desc_four;
            $aboutUpdate->image_id_four                 = $this->UploadImageUpdate($request->image_id_four, 'backend/uploads/about', $aboutUpdate->image_id_four);
            $aboutUpdate->title_five                    = $request->title_five;
            $aboutUpdate->subtitle_five                 = $request->subtitle_five;
            $aboutUpdate->desc_five                     = $request->desc_five;
            $aboutUpdate->download_app_link             = $request->download_app_link;
            $aboutUpdate->image_id_five                 = $this->UploadImageUpdate($request->image_id_five, 'backend/uploads/about', $aboutUpdate->image_id_five);
            $aboutUpdate->save();

            return true;
        } catch (\Throwable $th) {
            dd($th);
            return false;
        }
    }


}
