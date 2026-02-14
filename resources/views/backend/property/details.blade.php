@extends('backend.master')
@section('title')
{{ @$data['title'] }}
@endsection
@section('content')
<div class="page-content">
    <!-- profile content start -->
    <div class="profile-content">
      <div class="d-flex flex-column flex-lg-row gap-4 gap-lg-0">
        <!-- profile menu mobile start -->
        <div class="profile-menu-mobile">
          <button class="btn-menu-mobile" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasWithBothOptionsMenuMobile" aria-controls="offcanvasWithBothOptionsMenuMobile">
            <span class="icon"><i class="fa-solid fa-bars"></i></span>
          </button>

          <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1"
            id="offcanvasWithBothOptionsMenuMobile">
            <div class="offcanvas-header">
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">
                <span class="icon"><i class="fa-solid fa-xmark"></i></span>
              </button>
            </div>
            <div class="offcanvas-body">
              <!-- profile menu start -->
              <div class="profile-menu">
                <!-- profile menu head start -->
                <div class="profile-menu-head">
                  <div class="d-flex align-items-center">
                    <div class="image-box flex-shrink-0">
                      <img class="img-fluid rounded-circle" src="{{ @globalAsset($data['property']->defaultImage->path) }}"
                        alt="profile image"/>
                    </div>
                    <div class="flex-grow-1">
                      <div class="body">
                        <h2 class="title">{{ $data['property']->name }}</h2>
                        <p class="paragraph">{{ $data['property']->address }}</p>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- profile menu head end -->

                <!-- profile menu body start -->
                <div class="profile-menu-body">
                  <nav>
                    <ul class="nav flex-column">
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./profile">My Profile</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="./profile-attendance">Attendance</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="./profile-notices">Notices</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="./profile-leaves">Leaves</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="./profile-schedule">Schedule</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="./profile-phonebook">Phonebook</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="./profile-appointment">Appointment</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="./profile-support-ticket">Support Tickets</a>
                      </li>
                    </ul>
                  </nav>
                </div>
                <!-- profile menu body end -->
              </div>
              <!-- profile menu end -->
            </div>
          </div>
        </div>
        <!-- profile menu mobile end -->

        <!-- profile menu start -->
        <div class="profile-menu">
          <!-- profile menu head start -->
          <div class="profile-menu-head">
            <div class="d-flex align-items-center">
              <div class="image-box flex-shrink-0">

                <img class="img-fluid rounded-circle" src="{{ @globalAsset($data['property']->defaultImage->path) }}" alt="profile image" />
              </div>
              <div class="flex-grow-1">
                <div class="body">
                  <h2 class="title">{{ $data['property']->name }}</h2>
                  <p class="paragraph">{{ $data['property']->address }}</p>
                </div>
              </div>
            </div>
          </div>
          <!-- profile menu head end -->

          <!-- profile menu body start -->
          <div class="profile-menu-body">

           @include('backend.property.propert_nav')
          </div>
          <!-- profile menu body end -->
        </div>
        <!-- profile menu end -->

        <!-- profile body start -->
        <div class="profile-body">
          <h2 class="title">Basic Info</h2>


          <!-- profile body nav end -->
          <!-- profile body form start -->
          <div class="profile-body-form">
            <div class="form-item border-bottom-0 pb-0">
              <div class="image-box">
                <img id="id-profile-image" class="img-fluid rounded-circle"
                  src="{{ @globalAsset($data['property']->defaultImage->path) }}" alt="profile avatar" />
                <span class="icon" id="open-file-uploader"><i class="fa-solid fa-user-pen"></i></span>
                <input type="file" name="file" id="input-button" />
              </div>
            </div>
            <div class="form-item">
              <div class="d-flex justify-content-between align-content-center">
                <div class="align-self-center">
                  <h2 class="title">Name</h2>
                  <p class="paragraph">{{ $data['property']->name }}</p>
                </div>
                <div class="align-self-center">
                  <button type="button" class="btn-edit" data-bs-toggle="collapse" data-bs-target="#collapseName"
                    aria-expanded="false" aria-controls="collapseName">
                    Edit
                  </button>
                </div>
              </div>
              <div class="collapse" id="collapseName">
                <div class="form-box">
                  <form>
                    <input name="name" type="text" class="form-control ot-input" placeholder="{{ $data['property']->name }}" />
                    <button type="button" class="btn-update">
                      Update
                    </button>
                  </form>
                </div>
              </div>
            </div>
            <div class="form-item">
              <div class="d-flex justify-content-between align-content-center">
                <div class="align-self-center">
                  <h2 class="title">E-mail Address</h2>
                  <p class="paragraph">Email Address</p>
                </div>
                <div class="align-self-center">
                  <button type="button" class="btn-edit" data-bs-toggle="collapse" data-bs-target="#collapseEmail"
                    aria-expanded="false" aria-controls="collapseEmail">
                    Edit
                  </button>
                </div>
              </div>
              <div class="collapse" id="collapseEmail">
                <div class="form-box">
                  <form>
                    <input name="email" type="email" class="form-control ot-input" placeholder="Shakil@sookh.com" />
                    <button type="button" class="btn-update">
                      Update
                    </button>
                  </form>
                </div>
              </div>
            </div>
            <div class="form-item">
              <div class="d-flex justify-content-between align-content-center">
                <div class="align-self-center">
                  <h2 class="title">Date of Birth</h2>
                  <p class="paragraph">23 - 06 - 1995</p>
                </div>
                <div class="align-self-center">
                  <button type="button" class="btn-edit" data-bs-toggle="collapse" data-bs-target="#collapseDateOfBirth"
                    aria-expanded="false" aria-controls="collapseDateOfBirth">
                    Edit
                  </button>
                </div>
              </div>
              <div class="collapse" id="collapseDateOfBirth">
                <div class="form-box">
                  <form>
                    <input name="date_of_birth" type="date" class="form-control ot-input" />
                    <button type="button" class="btn-update">
                      Update
                    </button>
                  </form>
                </div>
              </div>
            </div>
            <div class="form-item">
              <div class="d-flex justify-content-between align-content-center">
                <div class="align-self-center">
                  <h2 class="title">Gender</h2>
                  <p class="paragraph">Male</p>
                </div>
                <div class="align-self-center">
                  <button type="button" class="btn-edit" data-bs-toggle="collapse" data-bs-target="#collapseGender"
                    aria-expanded="false" aria-controls="collapseGender">
                    Edit
                  </button>
                </div>
              </div>
              <div class="collapse" id="collapseGender">
                <div class="form-box">
                  <form>
                    <input name="gender" type="text" class="form-control ot-input" placeholder="Male" />
                    <button type="button" class="btn-update">
                      Update
                    </button>
                  </form>
                </div>
              </div>
            </div>
            <div class="form-item">
              <div class="d-flex justify-content-between align-content-center">
                <div class="align-self-center">
                  <h2 class="title">Phone Number</h2>
                  <p class="paragraph">+880 (249) 897 632</p>
                </div>
                <div class="align-self-center">
                  <button type="button" class="btn-edit" data-bs-toggle="collapse" data-bs-target="#collapsePhone"
                    aria-expanded="false" aria-controls="collapsePhone">
                    Edit
                  </button>
                </div>
              </div>
              <div class="collapse" id="collapsePhone">
                <div class="form-box">
                  <form>
                    <input name="phone" type="text" class="form-control ot-input" placeholder="+880 (249) 897 632" />
                    <button type="button" class="btn-update">
                      Update
                    </button>
                  </form>
                </div>
              </div>
            </div>
            <div class="form-item">
              <div class="d-flex justify-content-between align-content-center">
                <div class="align-self-center">
                  <h2 class="title">Address Line</h2>
                  <p class="paragraph">
                    78/2 Razia Tower, Manhattan, NewYork - 69006
                  </p>
                </div>
                <div class="align-self-center">
                  <button type="button" class="btn-edit" data-bs-toggle="collapse" data-bs-target="#collapseAddress"
                    aria-expanded="false" aria-controls="collapseAddress">
                    Edit
                  </button>
                </div>
              </div>
              <div class="collapse" id="collapseAddress">
                <div class="form-box">
                  <form>
                    <input name="address" type="text" class="form-control ot-input"
                      placeholder="78/2 Razia Tower, Manhattan, NewYork - 69006" />
                    <button type="button" class="btn-update">
                      Update
                    </button>
                  </form>
                </div>
              </div>
            </div>
            <div class="form-item">
              <div class="d-flex justify-content-between align-content-center">
                <div class="align-self-center">
                  <h2 class="title">Nationality</h2>
                  <p class="paragraph">Bangladesh</p>
                </div>
                <div class="align-self-center">
                  <button type="button" class="btn-edit" data-bs-toggle="collapse" data-bs-target="#collapseNationality"
                    aria-expanded="false" aria-controls="collapseNationality">
                    Edit
                  </button>
                </div>
              </div>
              <div class="collapse" id="collapseNationality">
                <div class="form-box">
                  <form>
                    <select class="form-select ot-input" aria-label="Default select example">
                      <option selected>Select a Country</option>
                      <option value="1">Bangladesh</option>
                      <option value="2">Iceland</option>
                      <option value="3">Moldova</option>
                    </select>
                    <button type="button" class="btn-update">
                      Update
                    </button>
                  </form>
                </div>
              </div>
            </div>
            <div class="form-item">
              <div class="d-flex justify-content-between align-content-center">
                <div class="align-self-center">
                  <h2 class="title">NID Number</h2>
                  <p class="paragraph">963 - 687 - 596</p>
                </div>
                <div class="align-self-center">
                  <button type="button" class="btn-edit" data-bs-toggle="collapse" data-bs-target="#collapseNid"
                    aria-expanded="false" aria-controls="collapseNid">
                    Edit
                  </button>
                </div>
              </div>
              <div class="collapse" id="collapseNid">
                <div class="form-box">
                  <form>
                    <input name="nid" type="text" class="form-control ot-input" placeholder="963 - 687 - 596" />
                    <button type="button" class="btn-update">
                      Update
                    </button>
                  </form>
                </div>
              </div>
            </div>
            <div class="form-item">
              <div class="d-flex justify-content-between align-content-center">
                <div class="align-self-center">
                  <h2 class="title">Passport</h2>
                  <p class="paragraph">N/A</p>
                </div>
                <div class="align-self-center">
                  <button type="button" class="btn-edit" data-bs-toggle="collapse" data-bs-target="#collapsePassport"
                    aria-expanded="false" aria-controls="collapsePassport">
                    Edit
                  </button>
                </div>
              </div>
              <div class="collapse" id="collapsePassport">
                <div class="form-box">
                  <form>
                    <input name="passport" type="text" class="form-control ot-input" placeholder="Q963687596" />
                    <button type="button" class="btn-update">
                      Update
                    </button>
                  </form>
                </div>
              </div>
            </div>
            <div class="form-item">
              <div class="d-flex justify-content-between align-content-center">
                <div class="align-self-center">
                  <h2 class="title">Blood Group</h2>
                  <p class="paragraph">N/A</p>
                </div>
                <div class="align-self-center">
                  <button type="button" class="btn-edit" data-bs-toggle="collapse" data-bs-target="#collapseBloodGroup"
                    aria-expanded="false" aria-controls="collapseBloodGroup">
                    Edit
                  </button>
                </div>
              </div>
              <div class="collapse" id="collapseBloodGroup">
                <div class="form-box">
                  <form>
                    <input name="blood_group" type="text" class="form-control ot-input" placeholder="A+ (Posative)" />
                    <button type="button" class="btn-update">
                      Update
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- profile body form end -->
      </div>
      <!-- profile body end -->
    </div>
  </div>
@endsection


@push('script')
@include('backend.partials.delete-ajax')
@endpush
