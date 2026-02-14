<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Image;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Blogs Image
        $lists = [
            'backend/uploads/blogs/blog_1.jpg',
            'backend/uploads/blogs/blog_2.jpg',
            'backend/uploads/blogs/blog_3.jpg',
            'backend/uploads/blogs/blog_4.jpg',
            'backend/uploads/blogs/blog_5.jpg',
        ];
        foreach ($lists as $key => $list) {
            $image = Image::create([
                'path' => $list,
            ]);
            $uploaded_blog_img[] = $image->id;
        }


        Blog::create([
            'title' => '10 Tips for First-Time Homebuyers',
            'content' => 'Are you a first-time homebuyer? Congratulations! Buying your first home is an exciting milestone, but it can also be overwhelming. In this blog post, we provide 10 tips to help make the home buying process smoother, from getting pre-approved for a mortgage to conducting a home inspection.',
            'slug' => 'first-time-homebuyers-tips',
            'tags' => 'homebuying, tips, first-time homebuyers, mortgage, inspection',
            'image_id' => $uploaded_blog_img[0],
            'category_id' => 1,
        ]);

        Blog::create([
            'title' => 'Maximizing Your Rental Property Investment',
            'content' => 'If you are a landlord or considering investing in rental property, you want to make the most out of your investment. In this blog post, we discuss strategies for maximizing rental property returns, from setting the right rental price to managing expenses and taxes.',
            'slug' => 'rental-property-investment',
            'tags' => 'real estate investing, rental property, landlord, rental price, expenses',
            'image_id' => $uploaded_blog_img[1],
            'category_id' => 2,
        ]);

        Blog::create([
            'title' => '5 Ways to Add Value to Your Home',
            'content' => 'Whether you are planning to sell your home or just want to increase its value, there are many ways to add value to your property. In this blog post, we share 5 strategies for adding value to your home, from making minor upgrades to renovating the kitchen or bathroom.',
            'slug' => 'add-value-to-home',
            'tags' => 'home value, renovations, upgrades, selling a home',
            'image_id' => $uploaded_blog_img[2],
            'category_id' => 3,
        ]);

        Blog::create([
            'title' => 'Benefits of Renting vs. Buying a Home',
            'content' => 'Deciding whether to rent or buy a home is a big decision, and it is not always an easy one. In this blog post, we explore the benefits of renting vs. buying a home, from flexibility and affordability to the long-term financial benefits of owning a home.',
            'slug' => 'rent-vs-buy',
            'tags' => 'renting, buying, home ownership, financial benefits, flexibility',
            'image_id' => $uploaded_blog_img[3],
            'category_id' => 1,
        ]);

        Blog::create([
            'title' => 'Preparing Your Home for Sale: A Checklist',
            'content' => 'Are you planning to sell your home? Before putting it on the market, there are several things you can do to make it more attractive to potential buyers. In this blog post, we provide a checklist of things to do before selling your home, from decluttering to staging and minor repairs.',
            'slug' => 'aliquam-faucibus',
            'tags' => 'selling a home, home staging, repairs, decluttering, home improvement',
            'image_id' => $uploaded_blog_img[4],
            'category_id' => 2,
        ]);
    }
}
