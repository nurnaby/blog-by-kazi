@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">All Contact message</h4>
                            <br>
                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                    <tr>
                                        <th>SL</th>
                                        <th> Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Time</th>

                                        <th>Action</th>

                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($contacts as $key => $item)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->phon }}</td>
                                            <td>{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</td>


                                            <td>


                                                <a href="{{ route('delete.message', $item->id) }}" class="btn btn-danger sm"
                                                    title="Delete Data" id="delete"> <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </td>

                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div>
    </div>
@endsection
