<?php

namespace App\Repositories;

use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Interfaces\LanguageInterface;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Artisan;

class LanguageRepository implements LanguageInterface
{

    private $model;

    public function __construct(Language $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return Language::all();
    }

    public function getAll()
    {
        return Language::latest()->paginate(15);
    }

    public function store($request)
    {
        try {
            $languageStore               = new $this->model;
            $languageStore->name         = $request->name;
            $languageStore->code         = $request->code;
            $languageStore->icon_class   = $request->flagIcon;
            $languageStore->direction    = $request->direction;
            $languageStore->save();

            $path                        = resource_path('lang/' . $request->code);
            if (!File::isDirectory($path)) :
                File::makeDirectory($path, 0777, true, true);
                File::copyDirectory(resource_path('lang/en'), resource_path('lang/' . $request->code));



            endif;


            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function show($id)
    {
        return $this->model->find($id);
    }

    public function update($request, $id)
    {
        try {
            $language               = $this->model->findOrfail($id);
            $language->name         = $request->name;
            $language->code         = $request->code;
            $language->icon_class   = $request->flagIcon;
            $language->direction    = $request->direction;

            $language->save();
            $path                        = resource_path('lang/' . $request->code);
            if (!File::isDirectory($path)) :
                File::makeDirectory($path, 0777, true, true);
                File::copyDirectory(resource_path('lang/en'), resource_path('lang/' . $request->code));


            endif;
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function destroy($id)
    {
        try {
            $languageDestroy   = $this->model->find($id);
            // delete directory
            File::deleteDirectory(base_path('lang/' . $languageDestroy->code));
            $languageDestroy->delete();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function terms($id)
    {
        $data['title']       = 'Langauge Terms';
        $data['language']    = $this->show($id);
        $path                = resource_path('lang/' . $data['language']->code);
        if (!File::isDirectory($path)) :
            File::makeDirectory($path, 0777, true, true);
            File::copyDirectory(resource_path('lang/en'), resource_path('lang/' . $data['language']->code));

        endif;

        if (File::isDirectory($path)) {
            $jsonString          = file_get_contents(resource_path("lang/" . $data['language']->code . "/common.json"));
        } else {
            $jsonString          = file_get_contents(resource_path('lang/en/common.json'));
        }
        $data['terms']           = json_decode($jsonString, true);
        return $data;
    }

    public function termsUpdate($request, $code)
    {
        try {
            $path           = resource_path('lang/' . $code);
            $jsonString     = file_get_contents(resource_path("lang/en/$request->lang_module.json"));
            $data           = json_decode($jsonString, true);

            foreach ($data as $key => $value) :
                $data[$key]        = $request->$key;
            endforeach;

            $newJsonString = json_encode($data, JSON_UNESCAPED_UNICODE);
            file_put_contents(resource_path("lang/$code/$request->lang_module.json"), stripslashes($newJsonString));

            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function setUserLang($request)
    {

        try {
            $user = auth()->user();
            $user->lang = $request->lang;
            $user->save();
            Cache::forget('languages');
        } catch (Exception $e) {
            return false;
        }
    }
}
