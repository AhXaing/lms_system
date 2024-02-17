@extends('instructor.instructor_dashboard')
@section('instructor')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Lecture</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add Lecture</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <a href="{{ route('add-course-lecture', ['id' => $lecture->course_id]) }}"
                    class="btn btn-secondary px-5">Back</a>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="row">
            <div class="col-xl-6 mx-auto">
                <div class="card">
                    <div class="card-body p-4">
                        <h5 class="mb-4">Edit Lecture</h5>
                        <form action="{{ route('update-course-lecture') }}" id="frmCategory" class="row g-3" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $lecture->id }}">

                            <div class="form-group col-md-12">
                                <label for="lecture_title" class="form-label">Lecture Title</label>
                                <div class="position-relative">
                                    <input type="text" class="form-control" name="lecture_title" id="lecture_title"
                                        placeholder="Lecture Title" value="{{ $lecture->lecture_title }}">
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="url" class="form-label">URL</label>
                                <div class="position-relative">
                                    <input type="text" class="form-control" name="url" id="url"
                                        placeholder="Video Url" value="{{ $lecture->url }}">
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="content" class="form-label">Content</label>
                                <div class="position-relative">
                                    <textarea class="form-control" name="content" id="content" rows="3">{{ $lecture->content }}</textarea>
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
@endsection
