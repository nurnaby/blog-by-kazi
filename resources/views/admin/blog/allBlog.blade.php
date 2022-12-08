@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">All Blog</h4>
                            <br>
                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                    <tr>
                                        <th>SL</th>
                                        <th>Blog Category Name</th>
                                        <th>Blog Title</th>
                                        <th>Blog Image</th>
                                        <th>Blog Tage</th>

                                        <th>Action</th>

                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($Blogs as $key => $Blog)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $blog->blog_category_id }}</td>
                                            <td>{{ $blog->blog_title }}</td>
                                            <td>{{ $blog->blog_tags }}</td>

                                            <td><img src="{{ asset($blog->blog_image) }}"
                                                    style="width: 60px; height: 50px;"></td>
                                            <td>
                                                <a href="{{ route('edit.protfolio', $blog->id) }}" class="btn btn-info sm"
                                                    title="Edit Data"> <i class="fas fa-edit"></i>
                                                </a>

                                                <a href="{{ route('delete.portfolio', $blog->id) }}"
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
