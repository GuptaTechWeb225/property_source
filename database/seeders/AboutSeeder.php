<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lists = [
            'backend/uploads/about/default_about.png',
            'backend/uploads/about/default_about.png',
            'backend/uploads/about/default_about.png',
            'backend/uploads/about/default_about.png',
            'backend/uploads/about/default_about.png',
        ];
        if (env('APP_DEMO')){
            $lists = [
                'backend/uploads/about/about_1.jpg',
                'backend/uploads/about/about_2.jpg',
                'backend/uploads/about/about_3.jpg',
                'backend/uploads/about/about_4.jpg',
                'backend/uploads/about/about_5.jpg',
            ];
        }

        foreach ($lists as $key => $list) {
            $image = Image::create([
                'path' => $list,
            ]);
            $uploaded_about_img[] = $image->id;
        }

        DB::table('abouts')->insert([
            [
                'main_title' => 'Search <span class="text-primary text-capitalize font-800 title-border">properties</span> for sale and for rent in World',
                'hero_desc' => 'We are a team of dedicated professionals whose goal is to provide high-end real estate services to our clients. Our company’s goal is to offer personalized solutions that meet the unique requirements of each customer. Whether you are looking to buy, sell, or rent a property, we are present to help you through every step of the way.
                    Our highly experienced agents have an in-depth understanding of the local real estate market and are geared with the late',
                'title_one' => 'ABOUT US',
                'subtitle_one' => 'Welcome to our nestkeeper!',
                'desc_one' => '<p class="mb_15">We are a team of dedicated professionals whose goal is to provide high-end real estate services to our clients. Our company’s goal is to offer personalized solutions that meet the unique requirements of each customer. Whether you are looking to buy, sell, or rent a property, we are present to help you through every step of the way.</p>
                <p class="mb_15">Our highly experienced agents have an in-depth understanding of the local real estate market and are geared with the latest tools and technology to guarantee that you get the best possible product. We pride ourselves on our cordial customer service and try our absolute best to make each and every transaction a seamless experience.</p>
                <p class="mb_15">At our Real Estate Company, we trust that integrity, empathy and transparency are key ingredients to building robust and long-lasting relationships with our clients. We are fully committed to providing open communication and full transparency throughout the entire procedure to ensure that you are well informed and empowered to make the best decisions for your unique situation.</p>
                <p class="mb_15">Our clients\' trust is precious to us and we understand that buying or selling a property is a significant decision. That\'s why we take sufficient time to listen diligently to your needs and goals, and we work relentlessly to exceed your expectations.</p>
                <p>Thank you for choosing nestkeeper as your Real Estate Company. We look forward to providing top-notch service and building the foundation to achieve your real estate goals.</p>',
                'image_id_one' => $uploaded_about_img[0],
                'title_two' => 'OUR MISSION',
                'subtitle_two' => 'Our mission is to Build a Strong Foundation For Your Life.',
                'desc_two' => '<p class="mb_15">Our mission is to provide the best real estate services to our clients, tuned to meet the specifications of each client. We are more than just committed to establishing  a smooth and stress-free experience for our beloved clients, whether they are buying, selling, or renting a property.</p>
                <p class="mb_15">We aim to be the go-to partner for all of our clients\' real estate needs, providing professional advice, guidance, and support through each and every step of the way. Our intention is to be the most reputed and reliable Real Estate Company out there. </p>',
                'image_id_two' => $uploaded_about_img[1],
                'title_three' => 'Our vision',
                'subtitle_three' => 'Our vision is to establish ourselves as the most trusted and reliable Real Estate Company. ',
                'desc_three' => '<p class="mb_15">We eagerly believe that every client is unique and deserves personalized solutions catered to meet their specifications and demands. Additionally, we intend to continue to innovate and stay ahead of the curve in the ever-evolving real estate industry, providing the latest technology and tools to boost our clients\' experience. </p>',
                'image_id_three' => $uploaded_about_img[2],
                'title_four' => 'Easy And Simple',
                'subtitle_four' => 'And these are our principles',
                'desc_four' => '<ul>
                <li>Client-centric approach: We put our clients\' needs first and strive to provide them with personalized solutions that meet their unique requirements.</li>
                <li>Professionalism: We conduct ourselves with the highest level of professionalism, treating our clients, colleagues, and partners with respect and integrity.</li>
                <li>Communication: We believe that open communication is key to building solid and long-lasting relationships with our clients. We keep our clients informed every step of the way, ensuring that they are empowered to make rational decisions.</li>
                <li>Transparency: We are transparent in our business practices, providing our clients with full disclosure of all relevant information related to their transactions.</li>
                <li>Efficiency: We understand that our clients\' time is valuable, and we strive to provide them with efficient and effective services, minimizing delays and maximizing results.</li>
                <li>Continuous improvement: We are committed to continuous learning and improvement, staying up-to-date with the latest industry trends and technologies, and continuously enhancing our skills and knowledge to better serve our clients.</li>
                <li>Community involvement: We believe in giving back to the community, and we actively participate in charitable activities and organizations that align with our values and mission.</li>
                   </ul>
                   <p>In summary, our Real Estate Company\'s principles are client-centric approach, professionalism, communication, transparency, efficiency, continuous improvement, and community involvement.</p>
                   ',
                'image_id_four' => $uploaded_about_img[3],
                'title_five' => 'DOWNLOAD APP',
                'subtitle_five' => 'Find your property solution anytime, anywhere',
                'desc_five' => 'Explore your future home with detailed videos',
                'download_app_link' => '#',
                'image_id_five' => $uploaded_about_img[4],
            ],

        ]);
    }
}
