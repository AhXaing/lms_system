@extends('instructor.instructor_dashboard')
@section('instructor')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Tables</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Talbe Course</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('add-course') }}" type="button" class="btn btn-primary">Add Course</a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Image</th>
                                <th>Course Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Discount</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($course as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <img src="{{ asset($item->course_image) }}" style="width: 70px; height: 40px;"
                                            alt="" />
                                    </td>
                                    <td>{{ $item->course_name }}</td>
                                    <td>{{ $item['category']['category_name'] }}</td>
                                    <td>{{ $item->selling_price }}</td>
                                    <td>{{ $item->discount_price }}</td>
                                    <td>
                                        <a href="{{ route('edit-course', $item->id) }}" class="btn btn-info btn-sm"
                                            title="Edit"><i class='bx bx-edit'></i></a>
                                        <a href="{{ route('delete-course', $item->id) }}" id="delete"
                                            class="btn btn-danger btn-sm" title="Delete"><i class='bx bx-trash'></i></a>
                                        <a href="{{ route('add-course-lecture', $item->id) }}"
                                            class="btn btn-warning btn-sm" title="Lecture"><i
                                                class='bx bx-list-plus'></i></a>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>

    <style>
        td {
            vertical-align: middle !important;
        }
    </style>
@endsection
