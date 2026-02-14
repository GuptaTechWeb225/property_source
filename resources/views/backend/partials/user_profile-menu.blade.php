<div class="profile-menu-head">
    <div class="d-flex align-items-center">
        <div class="image-box flex-shrink-0">
            <img class="img-fluid rounded-circle" src="{{ @globalAsset(@$user->defaultImage->path) }}"
                alt="profile image" />
        </div>
        <div class="flex-grow-1">
            <div class="body">
                <h2 class="title">{{ @$user->name }}</h2>
                <p class="paragraph">{{ @$user->designation->title }}</p>
            </div>
        </div>
    </div>
</div>
