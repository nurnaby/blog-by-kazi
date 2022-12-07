@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">All Blag Category</h4>
                            <br>
                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                    <tr>
                                        <th>SL</th>
                                        <th>Blog Category</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($BlogCategorys as $key => $BlogCategory)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $BlogCategory->blog_category }}</td>


                                            <td>
                                                <a href="{{ route('edit.blogCategory', $BlogCategory->id) }}"
                                                    class="btn btn-info sm" title="Edit Data"> <i class="fas fa-edit"></i>
                                                </a>

                                                <a href="{{ route('delete.blogCatogory', $BlogCategory->id) }}"
                                                    class="btn btn-danger sm" title="Delete Data" id="delete"> <i
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
