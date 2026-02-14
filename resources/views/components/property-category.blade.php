<div class="dropdown show category_menu">
    <a class="Categories_togler">
        All Categories
        <i class="fas fa-chevron-down"></i>
    </a>
    <div class="dropdown_menu catdropdown_menu">
        <div class="category_menu_scroll position-relative">
            <ul class=" ">

                <li><a class="dropdown-item has_arrow d-flex align-items-center d-none" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15.288" height="16.053" viewBox="0 0 15.288 16.053">
                            <g transform="translate(-2 -2.293)">
                                <g data-name="Group 1625" transform="translate(6.969 15.288)">
                                    <path data-name="Path 1962" d="M11.175,23.058A2.678,2.678,0,0,1,8.5,20.382a.382.382,0,1,1,.764,0,1.911,1.911,0,0,0,3.822,0,.382.382,0,1,1,.764,0A2.678,2.678,0,0,1,11.175,23.058Z" transform="translate(-8.5 -20)" />
                                </g>
                                <g data-name="Group 1626" transform="translate(2 2.293)">
                                    <path data-name="Path 1963" d="M16.142,16.759H3.147A1.147,1.147,0,0,1,2.4,14.741a5.314,5.314,0,0,0,1.892-4.068V8.351a5.351,5.351,0,1,1,10.7,0v2.322a5.308,5.308,0,0,0,1.886,4.063,1.147,1.147,0,0,1-.739,2.023ZM9.644,3.764A4.591,4.591,0,0,0,5.058,8.351v2.322A6.073,6.073,0,0,1,2.9,15.32a.382.382,0,0,0,.245.675H16.142a.382.382,0,0,0,.248-.673,6.078,6.078,0,0,1-2.159-4.649V8.351A4.591,4.591,0,0,0,9.644,3.764Z" transform="translate(-2 -3)" />
                                </g>
                            </g>
                        </svg>
                        Laptops &amp; Computers</a>
                    <!-- mega_width_menu  -->
                    <ul class="mega_width_menu">
                        <!-- single_menu  -->
                        <li class="pt-0">
                            <a class="mega_metu_title" href="#">Laptops & Computers</a>
                            <ul>
                                <li><a href="{{ route('properties') }}">Desktop Computers</a></li>
                                <li><a href="{{ route('properties') }}">Computer Accessories</a></li>
                                <li><a href="{{ route('properties') }}">Computer Components</a></li>
                                <li><a href="{{ route('properties') }}">Networking</a></li>
                                <li><a href="{{ route('properties') }}">Computer Monitors</a></li>
                            </ul>
                        </li>
                        <!-- single_menu  -->
                        <li class="pt-0">
                            <a class="mega_metu_title" href="#">Home Enternteinment</a>
                            <ul>
                                <li><a href="{{ route('properties') }}">Desktop Computers</a></li>
                                <li><a href="{{ route('properties') }}">Computer Accessories</a></li>
                                <li><a href="{{ route('properties') }}">Computer Components</a></li>
                                <li><a href="{{ route('properties') }}">Networking</a></li>
                                <li><a href="{{ route('properties') }}">Computer Monitors</a></li>
                            </ul>
                        </li>
                        <!-- single_menu  -->
                        <li class="pt-0">
                            <a class="mega_metu_title" href="#">Music Headphones</a>
                            <ul>
                                <li><a href="{{ route('properties') }}">Desktop Computers</a></li>
                                <li><a href="{{ route('properties') }}">Computer Accessories</a></li>
                                <li><a href="{{ route('properties') }}">Computer Components</a></li>
                                <li><a href="{{ route('properties') }}">Networking</a></li>
                                <li><a href="{{ route('properties') }}">Computer Monitors</a></li>
                            </ul>
                        </li>
                        <!-- single_menu  -->
                        <li class="pt-0">
                            <a class="mega_metu_title" href="#">Music Headphones</a>
                            <ul>
                                <li><a href="{{ route('properties') }}">Desktop Computers</a></li>
                                <li><a href="{{ route('properties') }}">Computer Accessories</a></li>
                                <li><a href="{{ route('properties') }}">Computer Components</a></li>
                                <li><a href="{{ route('properties') }}">Networking</a></li>
                                <li><a href="{{ route('properties') }}">Computer Monitors</a></li>
                            </ul>
                        </li>
                        <!-- single_menu  -->
                        <li class="img_menu pt-0 position-relative">
                            <div class="sub_menu_bg_img position-absolute end-0 bottom-0">
                                <img class="img-fluid" src="{{ url('frontend/img/menu_bg.png') }}" alt="">
                            </div>
                            <ul>
                                <li>
                                    <h6>PREMIUM SUPPLEMENTS</h6>
                                </li>
                                <li>
                                    <h4>Be Movie <br>
                                        Night Ready!</h4>
                                </li>
                                <li>
                                    <a class="shop_now" href="{{ route('properties') }}">Shop Now »</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <!--/ mega_width_menu -->
                </li>




                @foreach ($propertyCategories as $category)
                <li><a class="dropdown-item  d-flex align-items-center" href="{{ url('category', $category->slug) }}">
                        <img src="{{ @globalAsset($category->image->path)}}" class="max_14" alt="">
                        {{ $category->name }}</a>
                </li>
                @endforeach
            </ul>
        </div>

    </div>
</div>
