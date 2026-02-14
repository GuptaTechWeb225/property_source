<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class DocumentPaginateCollection extends ResourceCollection
{
    public function toArray($request)
    {

        $current_page = $this->currentPage();
        $total_pages = $this->lastPage();
        $base_url = \request()->url();


        return [
            'list' => $this->collection->map(function ($data) {
                // Extracting filename from attachment path
                $filename = $data->filename;

                // Initializing size to a default value
                $sizeInMB = "2.5 MB";

                // Checking if the file exists
                if (file_exists($data->attachment->path)) {
                    // Calculating the size of the file
                    $size = filesize($data->attachment->path);
                    $sizeInMB = round($size / (1024 * 1024), 2) . " MB";
                }

                // Get the file format/extension
                $extension = pathinfo($data->attachment->path, PATHINFO_EXTENSION);

                // Define an associative array mapping file extensions to icons
                $iconMap = [
                    'pdf' => 'pdf.png',
                    'doc' => 'doc.png',
                    'docx' => 'doc.png',
                    'xls' => 'xls.png',
                    'xlsx' => 'xls.png',
                    // Add more file extensions and corresponding icons as needed
                ];

                // Set a default icon if the extension is not found in the mapping
                $defaultIcon = 'default.png';

                // Determine the icon based on the file format/extension
                $icon = isset($iconMap[$extension]) ? $iconMap[$extension] : $defaultIcon;

                return [
                    'id' => @$data->id,
                    'filename' => $filename,
                    'date' => @$data->created_at->format('Y-m-d'),
                    'icon' => url('assets/documents/' . $icon),
                    'attachment_type' => @$data->attachment_type,
                    'size' => $sizeInMB,
                    'file' => apiAssetPath(@$data->attachment->path)
                ];
            }),



            // 'list' => $this->collection->map(function ($data) {
            //     return [
            //         'id' => @$data->id,
            //         'filename' => @$data->filename,
            //         'date' => @$data->created_at->format('Y-m-d'),
            //         'icon' => url('assets/documents/pdf.png'), //we have to update it later
            //         'attachment_type' => @$data->attachment_type,
            //         'size' => "2.5 MB",
            //         'file' => apiAssetPath(@$data->attachment->path)
            //     ];
            // }),
            'links' => [
                "first" =>  $base_url . "?page=1",
                "last" =>   $base_url . "?page=" . $total_pages,
                "prev" =>   $current_page > 1 ? $base_url . "?page=" . ($current_page - 1) : null,
                "next" =>   $current_page < $total_pages ? $base_url . "?page=" . ($current_page + 1) : null,
            ],
            'pagination' => [
                'total' => $this->total(),
                'count' => $this->count(),
                'per_page' => $this->perPage(),
                'current_page' => $this->currentPage(),
                'total_pages' => $this->lastPage(),
            ],
        ];
    }
}
