<div class="profile-menu-head">
    <div class="d-flex align-items-center">
        <div class="image-box flex-shrink-0">
            <img class="img-fluid rounded-circle" src="{{ @globalAsset($data['property']->defaultImage->path) }}"
                alt="profile image" />
        </div>
        <div class="flex-grow-1">
            <div class="body">
                <h2 class="title">{{ $data['property']->name }}</h2>
                <p class="paragraph">{{ $data['property']->address }}</p>
            </div>
        </div>
    </div>
</div>
