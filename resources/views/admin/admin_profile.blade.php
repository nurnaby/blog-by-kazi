@extends('admin.admin_master')

@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="d-flex justify-content-center py-3">

                            <img class="rounded-circle avatar-xl " src="{{ asset('backend/assets/images/small/img-5.jpg') }}"
                                alt="Card image cap">
                        </div>

                        <div class="card-body">
                            <h4 class="card-title">Name:{{ $userdata->name }}</h4>
                            <hr>
                            <h4 class="card-title">User Name:{{ $userdata->username }}</h4>
                            <hr>
                            <h4 class="card-title">Email:{{ $userdata->email }}</h4>
                            <hr>
                            <a href="{{ route('admin.edit') }}" class="btn btn-info waves-effect waves-light">Edit
                                Profile</a>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>
@endsection
