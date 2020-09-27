@extends('backend.layout.main')
@section('content')
    <main>
        <div class="container-fluid">
            <div class="card mb-4 mt-4">
                @include('backend.partials.messages')
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Data
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Action</th>
                                <th>Start date</th>

                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>SL</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Action</th>
                                <th>Start date</th>
                            </tr>
                            </tfoot>
                            <tbody>

                            @foreach ($data as $home_data)
                            <tr>
                                <td>1</td>
                                <td>{{ $home_data->title }}</td>
                                <td>{{ $home_data->description }}</td>
                                <td>
                                    <span class="badge badge-success">Edit</span>
                                    <span class="badge badge-danger">Delete</span>
                                </td>
                                <td>{{ $home_data->created_at }}</td>

                            </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
