<div class="profile-menu">
    <!-- profile menu head start -->
    <div class="profile-menu-head">
        <div class="d-flex align-items-center">
            <div class="flex-shrink-0">
                <img class="img-fluid rounded-circle" src="{{ @globalAsset($user->image->path) }}"
                    alt="{{ $user->name }}">
            </div>
            <div class="flex-grow-1">
                <div class="body">
                    <h2 class="title">{{ $user->name }}</h2>
                    <p class="paragraph">{{ $user->role->name }}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- profile menu head end -->

    <!-- profile menu body start -->
    <div class="profile-menu-body">
        @if (Auth::user()->role_id == 4)
            @include('bilnetpropertyownerform::preview_steps.form_nav')
        @endif
        @if (Auth::user()->role_id == 1)
            @include('bilnetpropertyownerform::preview_steps.user_form_nav')
        @endif
    </div>
    <!-- profile menu body end -->
</div>
