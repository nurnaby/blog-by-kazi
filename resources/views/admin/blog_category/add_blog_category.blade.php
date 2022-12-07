@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Add Blog Category</h4><br><br>
                            <form action="{{ route('store.blog.category') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Blog Category</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="blog_category"
                                            id="example-text-input">
                                        @error('blog_category')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- end row -->

                                <input type="submit" class="btn btn-info waves-effect waves-light"
                                    value="Add  Blog Category">
                                <!-- end row -->
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        @endsection
