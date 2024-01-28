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

            </div>
        </div>
        <!--end breadcrumb-->
        <div class="row">
            <div class="col-xl-6 mx-auto">
                <div class="card">
                    <div class="card-body p-4">
                        <h5 class="mb-4">Create Course</h5>
                        <form action="{{ route('store-course') }}" id="frmCourse" class="row g-3" method="POST"
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
                                <label for="image" class="form-label">Image</label>
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
                                <label for="video" class="form-label">Course Intro Video</label>
                                <div class="position-relative input-icon">
                                    <input type="file" class="form-control" name="video" id="video"
                                        placeholder="Video" accept="video/mp4, video/webm">
                                    <span class="position-absolute top-50 translate-middle-y"><i
                                            class='bx bxs-category'></i></span>
                                </div>
                            </div>

                            <div class="form-group col-md-6"></div>

                            <div class="form-group col-md-6">
                                <label for="category_id" class="form-label">Course Category</label>
                                <select name="category_id" id="category_id" class="form-select mb-3"
                                    aria-label="Default Select Example">
                                    <option selected="" disabled>Open this select menu</option>
                                    @foreach ($category as $cate)
                                        <option value="{{ $cate->id }}">{{ $cate->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="subcategory_id" class="form-label">Course Subcategory</label>
                                <select name="subcategory_id" id="subcategory_id" class="form-select mb-3"
                                    aria-label="Default Select Example">
                                    <option></option>

                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="label" class="form-label">Course Label</label>
                                <select name="label" id="label" class="form-select mb-3"
                                    aria-label="Default Select Example">
                                    <option selected="" disabled>Open this select menu</option>
                                    <option value="Begginer">Begginer</option>
                                    <option value="Middle">Middle</option>
                                    <option value="Advance">Advance</option>
                                </select>
                            </div>


                            <div class="form-group col-md-6">
                                <label for="certificate" class="form-label">Certificate Available</label>
                                <select name="certificate" id="certificate" class="form-select mb-3"
                                    aria-label="Default Select Example">
                                    <option selected="" disabled>Open this select menu</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="selling_price" class="form-label">Course Price</label>
                                <div class="position-relative input-icon">
                                    <input type="text" class="form-control" name="selling_price" id="selling_price"
                                        placeholder="Course Price">
                                    <span class="position-absolute top-50 translate-middle-y"><i
                                            class='bx bxs-category'></i></span>
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="discount_price" class="form-label">Discount Price</label>
                                <div class="position-relative input-icon">
                                    <input type="text" class="form-control" name="discount_price" id="discount_price"
                                        placeholder="Discount Price">
                                    <span class="position-absolute top-50 translate-middle-y"><i
                                            class='bx bxs-category'></i></span>
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="duration" class="form-label">Duration</label>
                                <div class="position-relative input-icon">
                                    <input type="text" class="form-control" name="duration" id="duration"
                                        placeholder="Duration">
                                    <span class="position-absolute top-50 translate-middle-y"><i
                                            class='bx bxs-category'></i></span>
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="resources" class="form-label">Resources</label>
                                <div class="position-relative input-icon">
                                    <input type="text" class="form-control" name="resources" id="resources"
                                        placeholder="Resources">
                                    <span class="position-absolute top-50 translate-middle-y"><i
                                            class='bx bxs-category'></i></span>
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="prerequisites" class="form-label">Prerequisites</label>
                                <div class="position-relative">
                                    <textarea rows="2" class="form-control" name="prerequisites" id="prerequisites" placeholder="Prerequisites"></textarea>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="description" class="form-label">Description</label>
                                <div class="position-relative">
                                    <textarea class="form-control" name="description" id="myeditorinstance"></textarea>
                                </div>
                            </div>

                            <p>Course Gaols</p>
                            <!--   //////////// Goal Option /////////////// -->
                            <div class="row add_item">
                                <div class="col-md-10">
                                    <div class="mb-3">
                                        <label for="goals" class="form-label"> Goals </label>
                                        <input type="text" name="goal_name[]" id="goals" class="form-control"
                                            placeholder="Goals ">
                                    </div>
                                </div>
                                <div class="form-group col-md-2" style="padding-top: 30px;">
                                    <a class="btn btn-success btn-sm addeventmore"><i class='bx bx-plus'></i></a>
                                </div>
                            </div> <!---end row-->
                            <!--   //////////// End Goal Option /////////////// -->

                            <hr />

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input id="bestseller" name="bestseller" type="checkbox"
                                            class="form-check-input" value="1">
                                        <label for="bestseller"> Best Seller</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input id="featured" name="featured" type="checkbox" class="form-check-input"
                                            value="1">
                                        <label for="featured"> Featured</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input id="highestrated" name="highestrated" type="checkbox"
                                            class="form-check-input" value="1">
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
