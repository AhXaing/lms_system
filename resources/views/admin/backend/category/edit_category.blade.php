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
                        <li class="breadcrumb-item active" aria-current="page">Edit Categories</li>
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
                        <h5 class="mb-4">Edit Category</h5>
                        <form action="{{ route('update-category') }}" id="frmCategory" class="row g-3" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $category->id }}" />

                            <div class="form-group col-md-12">
                                <label for="category_name" class="form-label">Category Name</label>
                                <div class="position-relative input-icon">
                                    <input type="text" class="form-control" name="category_name" id="category_name"
                                        placeholder="Category Name" value="{{ $category->category_name }}">
                                    <span class="position-absolute top-50 translate-middle-y"><i
                                            class='bx bxs-category'></i></span>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="input15" class="form-label">Image</label>
                                <div class="position-relative input-icon">
                                    <input type="file" class="form-control" name="image" id="image"
                                        placeholder="image">
                                    <span class="position-absolute top-50 translate-middle-y"><i
                                            class='bx bx-image'></i></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <img id="showImage" src="{{ asset($category->image) }}"
                                    class="rounded-circle p-1 bg-primary" width="110">
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
