@extends('admin.admin_master')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Edit Profile</h4>
                            <form action="{{ route('store.profile') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="name" id="example-text-input"
                                            value="{{ $editData->name }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">User Name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="username" id="example-text-input"
                                            value="{{ $editData->username }}">
                                    </div>
                                </div>
                                <!-- end row -->

                                <!-- end row -->
                                <div class="row
                                            mb-3">
                                    <label for="example-email-input" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="email" name="email" id="example-email-input"
                                            value="{{ $editData->email }}">
                                    </div>
                                </div>
                                <div class="row
                                                mb-3">
                                    <label for="example-email-input" class="col-sm-2 col-form-label">Image</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="profile_image" type="file" id="Image">
                                    </div>
                                </div>
                                <div class="row
                                                mb-3">
                                    <label for="example-email-input" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">

                                        <img id="showImage" class="rounded avatar-xl "
                                            src="{{ !empty($editData->profile_image) ? url('upload/admin_image/' . $editData->profile_image) : url('upload/no_image.jpg') }}"
                                            alt="Card image cap">
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Profile">
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
