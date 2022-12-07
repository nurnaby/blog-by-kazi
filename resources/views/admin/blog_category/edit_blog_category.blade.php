@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Edit Blog Category</h4><br><br>
                            <form action="{{ route('update.blog.category') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <input type="hidden" name="id" value="{{ $BlogCategorys->id }}">
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Blog Category</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="blog_category"
                                            id="example-text-input" value="{{ $BlogCategorys->blog_category }}">

                                    </div>
                                </div>

                                <!-- end row -->

                                <input type="submit" class="btn btn-info waves-effect waves-light"
                                    value="Update  Blog Category">
                                <!-- end row -->
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        @endsection
