@extends('admin.admin_master')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<style type="text/css">
    .bootstrap-tagsinput .tag {
        margin-right: 2px;
        color: #b70000;
        font-weight: 700px;
    }
</style>
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Edit Blog</h4>
                            <form action="{{ route('store.blog') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Blog Title</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="blog_title" id="example-text-input"
                                            value="{{ $Blogs->blog_title }}">

                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Blog Category</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example"
                                            name="blog_category_id">
                                            <option selected="">Open this select menu</option>
                                            @foreach ($blogCategorys as $blogCategory)
                                                <option value="{{ $blogCategory->id }}">{{ $blogCategory->blog_category }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <!-- end row -->

                                <!-- end row -->
                                <div class="row
                                            mb-3">
                                    <label for="example-email-input" class="col-sm-2 col-form-label">Blog
                                        Description</label>
                                    <div class="col-sm-10">
                                        <textarea required="" class="form-control" rows="5" name="blog_description">{{ $Blogs->blog_description }}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Blog Tags </label>
                                    <div class="col-sm-10">
                                        <input name="blog_tags" value="home,tech" class="form-control " type="text"
                                            data-role="tagsinput" {{ $Blogs->blog_tags }}>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-email-input" class="col-sm-2 col-form-label">Blog Image</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="blog_image" type="file" id="Image">
                                    </div>
                                </div>
                                <div class="row
                                                mb-3">
                                    <label for="example-email-input" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">

                                        <img id="showImage" class="rounded avatar-xl "
                                            src="{{ url('upload/no_image.jpg') }}" alt="Card image cap">
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Add  Blog">
                                <!-- end row -->
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                $(document).ready(function() {
                    $('#Image').change(function(e) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            $('#showImage').attr('src', e.target.result);
                        }
                        reader.readAsDataURL(e.target.files['0']);
                    });
                })
            </script>
        @endsection
