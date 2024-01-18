@extends('frontend.dashboard.user_dashboard')
@section('user')
    <div class="breadcrumb-content d-flex flex-wrap align-items-center justify-content-between mb-5">
        <div class="media media-card align-items-center">
            <div class="media-img media--img media-img-md rounded-full">
                <img class="rounded-full"
                    src="{{ !empty($profileData->photo) ? url('upload/user_profile_dashboard/' . $profileData->photo) : url('upload/no-image.png') }}"
                    alt="Student thumbnail image">
            </div>
            <div class="media-body">
                <h2 class="section__title fs-30">Hello, {{ $profileData->name }}</h2>
                <div class="rating-wrap d-flex align-items-center pt-2">

                    <span class="rating-total pl-1">{{ $profileData->email }}</span>
                </div><!-- end rating-wrap -->
            </div><!-- end media-body -->
        </div><!-- end media -->
        <div class="file-upload-wrap file-upload-wrap-2 file--upload-wrap">
            <input type="file" name="files[]" class="multi file-upload-input">
            <span class="file-upload-text"><i class="la la-upload mr-2"></i>Upload a course</span>
        </div><!-- file-upload-wrap -->
    </div><!-- end breadcrumb-content -->

    {{--  --}}


    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="edit-profile" role="tabpanel" aria-labelledby="edit-profile-tab">
            <div class="setting-body">
                <h3 class="fs-17 font-weight-semi-bold pb-4">Edit Profile</h3>
                <form method="POST" action="{{ route('user.update-profile') }}" class="row pt-40px"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="media media-card align-items-center">
                        <div class="media-img media-img-lg mr-4 bg-gray">
                            <img class="mr-3"
                                src="{{ !empty($profileData->photo) ? url('upload/user_profile_dashboard/' . $profileData->photo) : url('upload/no-image.png') }}"
                                alt="avatar image">
                        </div>
                        <div class="media-body">
                            <div class="file-upload-wrap file-upload-wrap-2">
                                <input type="file" name="photo" id="photo"
                                    class="multi file-upload-input with-preview" multiple>
                                <span class="file-upload-text"><i class="la la-photo mr-2"></i>Upload a Photo</span>
                            </div><!-- file-upload-wrap -->
                            <p class="fs-14">Max file size is 5MB, Minimum dimension: 200x200 And Suitable files are .jpg &
                                .png</p>
                        </div>
                    </div><!-- end media -->

                    <div class="input-box col-lg-6">
                        <label class="label-text">Name</label>
                        <div class="form-group">
                            <input class="form-control form--control" type="text" name="name" id="name"
                                value="{{ $profileData->name }}">
                            <span class="la la-user input-icon"></span>
                        </div>
                    </div><!-- end input-box -->
                    <div class="input-box col-lg-6">
                        <label class="label-text">User Name</label>
                        <div class="form-group">
                            <input class="form-control form--control" type="text" name="username" id="username"
                                value="{{ $profileData->username }}">
                            <span class="la la-user input-icon"></span>
                        </div>
                    </div><!-- end input-box -->
                    <div class="input-box col-lg-6">
                        <label class="label-text">Email Address</label>
                        <div class="form-group">
                            <input class="form-control form--control" type="email" name="email" id="email"
                                value="{{ $profileData->email }}">
                            <span class="la la-envelope input-icon"></span>
                        </div>
                    </div><!-- end input-box -->
                    <div class="input-box col-lg-6">
                        <label class="label-text">Phone Number</label>
                        <div class="form-group">
                            <input class="form-control form--control" type="text" name="phone" id="phone"
                                value="{{ $profileData->phone }}">
                            <span class="la la-phone input-icon"></span>
                        </div>
                    </div><!-- end input-box -->
                    <div class="input-box col-lg-12">
                        <label class="label-text">Address</label>
                        <div class="form-group">
                            <textarea class="form-control form--control user-text-editor pl-3" name="address" id="address">{{ $profileData->address }}</textarea>
                        </div>
                    </div><!-- end input-box -->
                    <div class="input-box col-lg-12 py-2">
                        <button type="submit" class="btn theme-btn">Save Changes</button>
                    </div><!-- end input-box -->
                </form>
            </div><!-- end setting-body -->
        </div><!-- end tab-pane -->



    </div><!-- end tab-content -->
@endsection
