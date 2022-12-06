@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">All Protfolio</h4>
                            <br>
                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                    <tr>
                                        <th>SL</th>
                                        <th>Portfolio Name</th>
                                        <th>Portfolio Title</th>
                                        <th>Portfolio Image</th>

                                        <th>Action</th>

                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($all_portfolios as $key => $all_portfolio)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $all_portfolio->protfolio_name }}</td>
                                            <td>{{ $all_portfolio->protfolio_title }}</td>

                                            <td>image</td>
                                            <td>
                                                <a href="#" class="btn btn-info sm" title="Edit Data"> <i
                                                        class="fas fa-edit"></i> </a>

                                                <a href="#" class="btn btn-danger sm" title="Delete Data"
                                                    id="delete"> <i class="fas fa-trash-alt"></i> </a>
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
