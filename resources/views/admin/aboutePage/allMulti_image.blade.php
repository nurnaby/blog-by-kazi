@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">All Multi Image</h4>
                            <br>
                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>All Multi Image</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>


                                <tbody>
                                    @php($i = 1)
                                    @foreach ($allMultiImage as $item)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td> <img src="{{ asset($item->multi_Image) }}"
                                                    style="width: 60px; height: 50px;"> </td>

                                            <td>
                                                <a href="{{ route('edit.multi.image', $item->id) }}" class="btn btn-info sm"
                                                    title="Edit Data"> <i class="fas fa-edit"></i> </a>

                                                <a href="" class="btn btn-danger sm" title="Delete Data"> <i
                                                        class="fas fa-trash-alt"></i> </a>
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
