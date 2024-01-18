@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Category</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add SubCategory</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('add-subcategory') }}" type="button" class="btn btn-primary">Add SubCategory</a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="row">
            <div class="col-xl-6 mx-auto">
                <div class="card">
                    <div class="card-body p-4">
                        <h5 class="mb-4">Create SubCategory</h5>
                        <form action="{{ route('store-subcategory') }}" id="frmCategory" class="row g-3" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="form-group col-md-12">
                                <label for="category_name" class="form-label">category Name</label>
                                <div class="position-relative input-icon">
                                    <select name="category_id" id="category_id" class="form-select mb-3"
                                        aria-label="Default Select Example">
                                        <option selected="" disabled>Open this select menu</option>
                                        @foreach ($category as $cate)
                                            <option value="{{ $cate->id }}">{{ $cate->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="category_name" class="form-label">Subcategory Name</label>
                                <div class="position-relative input-icon">
                                    <input type="text" class="form-control" name="subcategory_name" id="subcategory_name"
                                        placeholder="Subcategory Name">
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
                    subcategory_name: {
                        required: true,
                    },
                    category_id: {
                        required: true,
                    },
                },
                messages: {
                    subcategory_name: {
                        required: 'Please Enter subcategory name',
                    },
                    category_id: {
                        required: 'Please Select category name',
                    }
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
@endsection
