<?php


namespace Modules\Marsland\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Interfaces\LeadershipInterface;
use App\Interfaces\TestimonialInterface;
use App\Models\Page;

class ContentPageController extends Controller
{

    protected $testimonial;
    protected $leadership;

    public function __construct(TestimonialInterface $testimonialInterface, LeadershipInterface $leadershipInterface)
    {
        $this->testimonial = $testimonialInterface;
        $this->leadership = $leadershipInterface;
    }


    public function contentPage($slug)
    {
        $data = Page::with('image')->where('slug', $slug)->first();


        if ($data) {
            $testimonials = [];
            $leaderships = [];
            if ($data->show_testimonial) {
                $testimonials =  $this->testimonial->getList();
            }
            if ($data->show_leadership) {
                $leaderships =  $this->leadership->getList();
            }

            return view('marsland::pages.content', compact('data', 'testimonials','leaderships'));
        }

        abort(404);
    }
}
