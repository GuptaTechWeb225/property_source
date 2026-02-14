<?php

namespace App\Traits;

use App\Models\Icon;
use App\Models\Image;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

trait CommonHelperTrait
{
    // protected $path_prefix = 'public';

    public function UploadImageCreate($image, $path)
    {
        try {
            $directory = public_path($path);


            if (!File::isDirectory($directory)) :
                File::makeDirectory($directory, 0777, true, true);
            endif;

            //code...
            if ($image && is_file($image)) {
                $extension = $image->guessExtension();
                $filename  = time() . '.' . $extension;

                $image_record       = new Image();
                if (setting('file_system') == 's3') {
                    // $path = $this->path_prefix . '/' . $path;
                    // $filePath = Storage::disk('s3')->put($this->path_prefix . '/' . $path, $image);
                    $filePath       = s3Upload($path, $image);
                    $imagePostSuccess = Storage::disk('s3')->exists($filePath);
                    $image_record->path = $filePath;
                } else {
                    $image->move($path, $filename);
                    $image_record->path = $path . '/' . $filename;
                }
                $image_record->save();



                return $image_record->id;
            }
        } catch (\Throwable $th) {
            return null;
        }
    }

    public function UploadIconCreate($icon, $path)
    {
        if ($icon && is_file($icon)) {

            $extension = $icon->guessExtension();
            $filename  = time() . '.' . $extension;

            $icon_record       = new Icon();
            if (setting('file_system') == 's3') {
                // $path = $this->path_prefix . '/' . $path;
                // $filePath = Storage::disk('s3')->put($this->path_prefix . '/' . $path, $image);
                $filePath       = s3Upload($path, $icon);
                $iconPostSuccess = Storage::disk('s3')->exists($filePath);
                $icon_record->path = $filePath;
            } else {
                $icon->move($path, $filename);
                $icon_record->path = $path . '/' . $filename;
            }
            $icon_record->save();

            return $icon_record->id;
        }
        return null;
    }

    public function UploadImageUpdate($image, $path, $image_id)
    {
        if ($image && is_file($image)) {

            if ($image_id) {
                $image_record = Image::find($image_id);
                if (setting('file_system') == 's3') {
                    Storage::disk('s3')->delete($image_record->path);
                } else {
                    $file_path    = public_path($image_record->path);
                    if (file_exists($file_path)) {
                        File::delete($file_path);
                    }
                }
            } else {
                $image_record = new Image();
            }

            $extension          = $image->guessExtension();
            $filename           = time() . '.' . $extension;
            if (setting('file_system') == 's3') {
                // $filePath = Storage::disk('s3')->put($this->path_prefix . '/' . $path, $image);
                // $path = $this->path_prefix . '/' . $path;
                $filePath       = s3Upload($path, $image);
                $image_record->path = $filePath;
            } else {
                $image->move($path, $filename);
                $image_record->path = $path . '/' . $filename;
            }

            $image_record->save();
            return $image_record->id;
        }
        return $image_id;
    }

    public function UploadIconUpdate($icon, $path, $icon_id)
    {
        if ($icon && is_file($icon)) {

            if ($icon_id) {
                $icon_record = Icon::find($icon_id);
                if (setting('file_system') == 's3') {
                    Storage::disk('s3')->delete($icon_record->path);
                } else {
                    $file_path    = public_path($icon_record->path);
                    if (file_exists($file_path)) {
                        File::delete($file_path);
                    }
                }
            } else {
                $icon_record = new Icon();
            }

            $extension          = $icon->guessExtension();
            $filename           = time() . '.' . $extension;
            if (setting('file_system') == 's3') {
                // $filePath = Storage::disk('s3')->put($this->path_prefix . '/' . $path, $icon);
                // $path = $this->path_prefix . '/' . $path;
                $filePath       = s3Upload($path, $icon);
                $icon_record->path = $filePath;
            } else {
                $icon->move($path, $filename);
                $icon_record->path = $path . '/' . $filename;
            }

            $icon_record->save();
            return $icon_record->id;
        }
        return $icon_id;
    }

    public function UploadImageDelete($image_id)
    {
        if ($image_id) {
            $image_record = Image::find($image_id);
            $file_path    = public_path($image_record->path);
            if (file_exists($file_path)) {
                File::delete($file_path);
            }
            $image_record->delete();
        }
        return true;
    }

    public function UploadIconDelete($icon_id)
    {
        if ($icon_id) {
            $icon_record = Icon::find($icon_id);
            $file_path    = public_path($icon_record->path);
            if (file_exists($file_path)) {
                File::delete($file_path);
            }
            $icon_record->delete();
        }
        return true;
    }

    public function setEnvironmentValue($envKey, $envValue)
    {
        try {
            $envFile = app()->environmentFilePath();

            $contents = File::get($envFile);

            $newLine = "{$envKey}=\"{$envValue}\"";

            if (strpos($contents, "{$envKey}=") !== false) {
                $contents = preg_replace("/{$envKey}=.*/", $newLine, $contents);
            } else {
                $contents .= "\n" . $newLine;
            }

            File::put($envFile, $contents);

            Log::info("Environment variable {$envKey} set to {$envValue}");

            return true;
        } catch (\Exception $e) {
            Log::error("Failed to set environment variable {$envKey}: {$e->getMessage()}");
            return false;
        }
    }
}
