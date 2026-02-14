<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Page::with('image')->where('slug', $request->slug)->first();
        if($data){
            return view('frontend.pages',compact('data'));
        }

        abort(404);
    }


    public function backupPages()
    {
        $contents = [];
        foreach (frontendMenus() as $content) {
            $contents[] = flattenPages($content);
        }

        file_put_contents('contents_data.php', '<?php return ' . var_export($contents, true) . ';');
        return 'Page restored';
    }
}
