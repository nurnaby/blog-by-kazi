@extends('admin.admin_master')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Add Protfolio</h4>
                            <form action="{{ route('store.portfolio') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Protfolio name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="protfolio_name"
                                            id="example-text-input">
                                        @error('protfolio_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Protfolio Title</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="protfolio_title"
                                            id="example-text-input">
                                        @error('protfolio_title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- end row -->

                                <!-- end row -->
                                <div class="row
                                            mb-3">
                                    <label for="example-email-input" class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-10">
                                        <textarea required="" class="form-control" rows="5" name="protfolio_description"></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-email-input" class="col-sm-2 col-form-label">Protfolio Image</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="protfolio_image" type="file" id="Image">
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
                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Add  Portfolio">
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
