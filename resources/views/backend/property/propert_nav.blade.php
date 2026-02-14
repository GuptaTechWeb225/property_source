
<nav>

    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link {{ request()->route()->parameters['type'] === 'basicInfo' ? 'active' : '' }}" href="{{ route('admin.properties.details', [$data['property']->id, 'basicInfo']) }}">Basic Info</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->route()->parameters['type'] === 'gallery' ? 'active' : '' }} " href="{{ route('admin.properties.details', [$data['property']->id, 'gallery']) }}">Gallery</a>
        </li>
         <li class="nav-item">
            <a class="nav-link {{ request()->route()->parameters['type'] === 'tenant' ? 'active' : '' }}" href="{{ route('admin.properties.details', [$data['property']->id, 'tenant']) }}">Tenants</a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->route()->parameters['type'] === 'facility' ? 'active' : '' }}" href="{{ route('admin.properties.details', [$data['property']->id, 'facility']) }}">Facilities</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->route()->parameters['type'] === 'floorPlan' ? 'active' : '' }}" href="{{ route('admin.properties.details', [$data['property']->id, 'floorPlan']) }}">Floor Plan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->route()->parameters['type'] === 'documents' ? 'active' : '' }}" href="{{ route('admin.properties.details', [$data['property']->id, 'documents']) }}">Documents</a>
        </li>
    </ul>
</nav>
