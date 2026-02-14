@php
    $tabs = [
        ['name' => 'My Properties', 'link' => 'landlord.property.index'],
        ['name' => 'Viewings', 'link' => 'landlord.property.views'],
        ['name' => 'Offers', 'link' => 'landlord.property.offer'],
        ['name' => 'Documents', 'link' => 'landlord.property.document'],
        ['name' => 'Finances', 'link' => 'landlord.finances'],
        ['name' => 'Maintenance', 'link' => 'landlord.maintenance']
     ];
@endphp

<div class="tab-wrapper">
    <div class="tab_wrapper_header d-flex justify-content-between align-items-center mb-2 d-lg-none mb-4">
        <span class="font_16 f_w_600 text-capitalize">Tab Menu</span>
        <button class="border-0 bg-transparent fs-4 tab_menu_active"><i class="ti-menu-alt"></i></button>
    </div>

    <div class="tab_mobile">
        <div class="d-flex justify-content-between align-items-center d-lg-none mb-3 border-bottom pb-3">
            <span class="font_16 f_w_600 text-capitalize">Tab Menu</span>
            <button class="border-0 bg-transparent fs-4 tab_menu_active"><i class="ti-close"></i></button>
        </div>
        <ul class="nav tab-style2 mb-4 ">
            @foreach($tabs as $tab)
                <li class="nav-item">
                    <a href="{{ isset($tab['link']) ? route($tab['link']) : '#' }}" class="nav-link {{ set_menu([$tab['link']],'active') }}">
                        <span>{{ $tab['name'] }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
