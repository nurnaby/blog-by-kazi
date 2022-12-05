@extends('admin.admin_master')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title"> Update Multi Image </h4>
                            <br>
                            <br>
                            <form action="{{ route('update.multi.image', $editMultiImages->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')


                                <div class="row mb-3">
                                    <label for="example-email-input" class="col-sm-2 col-form-label">Multi Image</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="multi_Image" type="file" id="Image">
                                    </div>
                                </div>
                                <div class="row
                                                mb-3">
                                    <label for="example-email-input" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">

                                        <img id="showImage" class="rounded avatar-xl "
                                            src="{{ asset($editMultiImages->multi_Image) }}" alt="Card image cap">
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-info waves-effect waves-light"
                                    value="Update Multi Image ">
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
