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
                        <li class="breadcrumb-item active" aria-current="page">Edit Course</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">

            </div>
        </div>
        <!--end breadcrumb-->
        <div class="row">
            <div>
                <div class="card">
                    <div class="card-body p-4">
                        <h5 class="mb-4">Edit Course</h5>
                        <form action="{{ route('update-course') }}" id="frmCourse" class="row g-3" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="course_id" value="{{ $course->id }}" />
                            <div class="form-group col-md-6">
                                <label for="course_name" class="form-label">Course Name</label>
                                <div class="position-relative input-icon">
                                    <input type="text" class="form-control" name="course_name" id="course_name"
                                        placeholder="Course Name" value="{{ $course->course_name }}">
                                    <span class="position-absolute top-50 translate-middle-y"><i
                                            class='bx bxs-category'></i></span>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="course_title" class="form-label">Course Title</label>
                                <div class="position-relative input-icon">
                                    <input type="text" class="form-control" name="course_title" id="course_title"
                                        placeholder="Course Title" value="{{ $course->course_title }}">
                                    <span class="position-absolute top-50 translate-middle-y"><i
                                            class='bx bxs-category'></i></span>
                                </div>
                            </div>


                            <div class="form-group col-md-6">
                                <label for="category_id" class="form-label">Course Category</label>
                                <select name="category_id" id="category_id" class="form-select mb-3"
                                    aria-label="Default Select Example">
                                    <option selected="" disabled>Open this select menu</option>
                                    @foreach ($category as $cate)
                                        <option value="{{ $cate->id }}"
                                            {{ $cate->id == $course->category_id ? 'selected' : '' }}>
                                            {{ $cate->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="subcategory_id" class="form-label">Course Subcategory</label>
                                <select name="subcategory_id" id="subcategory_id" class="form-select mb-3"
                                    aria-label="Default Select Example">
                                    <option selected="" disabled>Open this select menu</option>
                                    @foreach ($subcategory as $subcate)
                                        <option value="{{ $subcate->id }}"
                                            {{ $subcate->id == $course->subcategory_id ? 'selected' : '' }}>
                                            {{ $subcate->subcategory_name }}</option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="label" class="form-label">Course Label</label>
                                <select name="label" id="label" class="form-select mb-3"
                                    aria-label="Default Select Example">
                                    <option selected="" disabled>Open this select menu</option>
                                    <option value="Begginer" {{ $course->label == 'Begginer' ? 'selected' : '' }}>
                                        Begginer</option>
                                    <option value="Middle" {{ $course->label == 'Middle' ? 'selected' : '' }}>Middle
                                    </option>
                                    <option value="Advance" {{ $course->label == 'Advance' ? 'selected' : '' }}>
                                        Advance</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="certificate" class="form-label">Certificate Available</label>
                                <select name="certificate" id="certificate" class="form-select mb-3"
                                    aria-label="Default Select Example">
                                    <option selected="" disabled>Open this select menu</option>
                                    <option value="Yes" {{ $course->certificate == 'Yes' ? 'selected' : '' }}>Yes
                                    </option>
                                    <option value="No" {{ $course->certificate == 'No' ? 'selected' : '' }}>No</option>
                                </select>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="selling_price" class="form-label">Course Price</label>
                                <div class="position-relative input-icon">
                                    <input type="text" class="form-control" name="selling_price" id="selling_price"
                                        placeholder="Course Price" value="{{ $course->selling_price }}">
                                    <span class="position-absolute top-50 translate-middle-y"><i
                                            class='bx bxs-category'></i></span>
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="discount_price" class="form-label">Discount Price</label>
                                <div class="position-relative input-icon">
                                    <input type="text" class="form-control" name="discount_price" id="discount_price"
                                        placeholder="Discount Price" value="{{ $course->discount_price }}">
                                    <span class="position-absolute top-50 translate-middle-y"><i
                                            class='bx bxs-category'></i></span>
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="duration" class="form-label">Duration</label>
                                <div class="position-relative input-icon">
                                    <input type="text" class="form-control" name="duration" id="duration"
                                        placeholder="Duration" value="{{ $course->duration }}">
                                    <span class="position-absolute top-50 translate-middle-y"><i
                                            class='bx bxs-category'></i></span>
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="resources" class="form-label">Resources</label>
                                <div class="position-relative input-icon">
                                    <input type="text" class="form-control" name="resources" id="resources"
                                        placeholder="Resources" value="{{ $course->resources }}">
                                    <span class="position-absolute top-50 translate-middle-y"><i
                                            class='bx bxs-category'></i></span>
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="prerequisites" class="form-label">Prerequisites</label>
                                <div class="position-relative" \>
                                    <textarea rows="2" class="form-control" name="prerequisites" id="prerequisites" placeholder="Prerequisites">{{ $course->prerequisites }}</textarea>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="description" class="form-label">Description</label>
                                <div class="position-relative">
                                    <textarea class="form-control" name="description" id="myeditorinstance">{!! $course->description !!}</textarea>
                                </div>
                            </div>

                            <hr />

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input id="bestseller" name="bestseller" type="checkbox"
                                            class="form-check-input" value="1"
                                            {{ $course->bestseller == '1' ? 'checked' : '' }}>
                                        <label for="bestseller"> Best Seller</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input id="featured" name="featured" type="checkbox" class="form-check-input"
                                            value="1" {{ $course->featured == '1' ? 'checked' : '' }}>
                                        <label for="featured"> Featured</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input id="highestrated" name="highestrated" type="checkbox"
                                            class="form-check-input" value="1"
                                            {{ $course->highestrated == '1' ? 'checked' : '' }}>
                                        <label for="highestrated"> Highest Rated</label>
                                    </div>
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

    {{-- Main Course Image Update --}}
    <div class="page-content">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('update-course-image') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $course->id }}" />
                    <input type="hidden" name="old_image" value="{{ $course->course_image }}" />
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="image" class="form-label">Image</label>
                            <div class="position-relative input-icon">
                                <input type="file" class="form-control" name="course_image" id="image"
                                    placeholder="course image">
                                <span class="position-absolute top-50 translate-middle-y"><i
                                        class='bx bx-image'></i></span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <img id="showImage" src="{{ asset($course->course_image) }}"
                                class="rounded-circle p-1 bg-primary" width="110">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-md-flex d-grid align-items-center gap-3">
                                <button type="submit" class="btn btn-primary px-4"><i class='bx bxs-save'></i>
                                    Save</button>
                                <button class="btn btn-light px-4"><i class='bx bx-reset'></i>
                                    Reset</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- end --}}

    {{-- Main Course Video Update --}}
    <div class="page-content">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('update-course-video') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="vid" value="{{ $course->id }}" />
                    <input type="hidden" name="old_video" value="{{ $course->video }}" />
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="image" class="form-label">Video</label>
                            <div class="position-relative input-icon">
                                <input type="file" class="form-control" name="video" id="video"
                                    accept="video/mp4, video/webm">
                                <span class="position-absolute top-50 translate-middle-y"><i
                                        class='bx bx-image'></i></span>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <video width="300" height="130" controls>
                                <source src="{{ asset($course->video) }}" type="video/mp4">
                            </video>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-md-flex d-grid align-items-center gap-3">
                                <button type="submit" class="btn btn-primary px-4"><i class='bx bxs-save'></i>
                                    Save</button>
                                <button class="btn btn-light px-4"><i class='bx bx-reset'></i>
                                    Reset</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- end --}}


    {{-- Main Course goals Update --}}
    <div class="page-content">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('update-course-goals') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $course->id }}" />

                    @foreach ($CourseGoal as $goals)
                        <div class="row add_item">
                            <div class="whole_extra_item_delete" id="whole_extra_item_delete">
                                <div class="container mt-2">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="mb-3">
                                                <label for="goals" class="form-label"> Goals </label>
                                                <input type="text" name="goal_name[]" id="goals"
                                                    class="form-control" placeholder="Goals"
                                                    value="{{ $goals->goal_name }}">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2" style="padding-top: 30px;">
                                            <a class="btn btn-success btn-sm addeventmore"><i class='bx bx-plus'></i></a>
                                            <span class="btn btn-danger btn-sm removeeventmore"><i
                                                    class='bx bx-trash'></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!---end row-->
                    @endforeach
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-md-flex d-grid align-items-center gap-3">
                                <button type="submit" class="btn btn-primary px-4"><i class='bx bxs-save'></i>
                                    Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- end --}}


    <!--========== Start of add multiple class with ajax ==============-->
    <div style="visibility: hidden">
        <div class="whole_extra_item_add" id="whole_extra_item_add">
            <div class="whole_extra_item_delete" id="whole_extra_item_delete">
                <div class="container mt-2">
                    <div class="row">
                        <div class="form-group col-md-10">
                            <label for="goals">Goals</label>
                            <input type="text" name="goal_name[]" id="goals" class="form-control"
                                placeholder="Goals  ">
                        </div>
                        <div class="form-group col-md-2" style="padding-top: 20px">
                            <span class="btn btn-success btn-sm addeventmore"><i class='bx bx-plus'></i></span>
                            <span class="btn btn-danger btn-sm removeeventmore"><i class='bx bx-trash'></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!----For Section-------->
    <script type="text/javascript">
        $(document).ready(function() {
            var counter = 0;
            $(document).on("click", ".addeventmore", function() {
                var whole_extra_item_add = $("#whole_extra_item_add").html();
                $(this).closest(".add_item").append(whole_extra_item_add);
                counter++;
            });
            $(document).on("click", ".removeeventmore", function(event) {
                $(this).closest("#whole_extra_item_delete").remove();
                counter -= 1
            });
        });
    </script>
    <!--========== End of add multiple class with ajax ==============-->


    <script type="text/javascript">
        $(document).ready(function() {
            $('#frmCourse').validate({
                rules: {
                    course_name: {
                        required: true,
                    },
                    course_title: {
                        required: true,
                    },
                },
                messages: {
                    course_name: {
                        required: 'Please Enter course name',
                    },
                    course_title: {
                        required: 'Please select course title',
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

    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function() {
                var category_id = $(this).val();
                if (category_id) {
                    $.ajax({
                        url: "{{ url('/subcategory/ajax') }}/" + category_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="subcategory_id"]').html('');
                            var d = $('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="subcategory_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .subcategory_name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>
@endsection
