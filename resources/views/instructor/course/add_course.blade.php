@extends('instructor.instructor_dashboard')
@section('instructor')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Course</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add Course</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('add-category') }}" type="button" class="btn btn-primary">Add Category</a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="row">
            <div class="col-xl-6 mx-auto">
                <div class="card">
                    <div class="card-body p-4">
                        <h5 class="mb-4">Create Course</h5>
                        <form action="{{ route('store-category') }}" id="frmCategory" class="row g-3" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="form-group col-md-6">
                                <label for="course_name" class="form-label">Course Name</label>
                                <div class="position-relative input-icon">
                                    <input type="text" class="form-control" name="course_name" id="course_name"
                                        placeholder="Course Name">
                                    <span class="position-absolute top-50 translate-middle-y"><i
                                            class='bx bxs-category'></i></span>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="course_title" class="form-label">Course Title</label>
                                <div class="position-relative input-icon">
                                    <input type="text" class="form-control" name="course_title" id="course_title"
                                        placeholder="Course Title">
                                    <span class="position-absolute top-50 translate-middle-y"><i
                                            class='bx bxs-category'></i></span>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="course_image" class="form-label">Image</label>
                                <div class="position-relative input-icon">
                                    <input type="file" class="form-control" name="course_image" id="image"
                                        placeholder="course image">
                                    <span class="position-absolute top-50 translate-middle-y"><i
                                            class='bx bx-image'></i></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <img id="showImage" src="{{ url('upload/no-image.png') }}"
                                    class="rounded-circle p-1 bg-primary" width="110">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="course_title" class="form-label">Course Intro Video</label>
                                <div class="position-relative input-icon">
                                    <input type="file" class="form-control" name="video" id="video"
                                        placeholder="Video" accept="video/mp4, video/webm">
                                    <span class="position-absolute top-50 translate-middle-y"><i
                                            class='bx bxs-category'></i></span>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="d-md-flex d-grid align-items-center gap-3">
                                    <button type="submit" class="btn btn-primary px-4"><i class='bx bxs-save'></i>
                                        Save</button>
                                    <button class="btn btn-light px-4"><i class='bx bx-reset'></i>
                                        Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#frmCategory').validate({
                rules: {
                    category_name: {
                        required: true,
                    },
                    image: {
                        required: true,
                    },
                },
                messages: {
                    category_name: {
                        required: 'Please Enter category name',
                    },
                    image: {
                        required: 'Please select category image',
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
