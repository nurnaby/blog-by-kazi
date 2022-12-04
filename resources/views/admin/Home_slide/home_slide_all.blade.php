@extends('admin.admin_master')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Update Slide</h4>
                            <form action="{{ route('Update.home_slide') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <input class="form-control" type="hidden" name="id" id="example-text-input"
                                    value="{{ $homeSlide->id }}">
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="title" id="example-text-input"
                                            value="{{ $homeSlide->title }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Short Title</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="short_title"
                                            id="example-text-input" value="{{ $homeSlide->short_title }}">
                                    </div>
                                </div>
                                <!-- end row -->

                                <!-- end row -->
                                <div class="row
                                            mb-3">
                                    <label for="example-email-input" class="col-sm-2 col-form-label">video Url</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="video_url" id="example-email-input"
                                            value="{{ $homeSlide->video_url }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-email-input" class="col-sm-2 col-form-label">Image</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="home_silde" type="file" id="Image">
                                    </div>
                                </div>
                                <div class="row
                                                mb-3">
                                    <label for="example-email-input" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">

                                        <img id="showImage" class="rounded avatar-xl "
                                            src="{{ !empty($homeSlide->home_silde) ? url($homeSlide->home_silde) : url('upload/no_image.jpg') }}"
                                            alt="Card image cap">
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-info waves-effect waves-light"
                                    value="Update Home slide">
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
