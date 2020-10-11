@extends('backend.layout.main')
@section('content')
    <main>
        <div class="container-fluid">
            <div class="card mb-4 mt-4">
                @include('backend.partials.messages')
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Seen Message Box Data
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Full Name</th>

                                <th>Email</th>
                                <th>Subject</th>
                                <th>Date</th>
                                <th>Actions</th>

                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>SL</th>
                                <th>Full Name</th>

                                <th>Email</th>
                                <th>Subject</th>
                                <th>Date</th>
                                <th>Actions</th>

                            </tr>
                            </tfoot>
                            <tbody>

                            @foreach ($data as $msg_data)

                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $msg_data->fullname }}</td>


                                    <td>{{ $msg_data->email }}</td>
                                    <td>{{ $msg_data->subject }}</td>
                                    <td>
                                        <a href="#" class="badge badge-success">
                                            <i class="fa fa-edit" aria-hidden="true"></i>
                                        </a>

                                        <a href="#deleteModal{{ $msg_data->id }}" data-toggle="modal" class="badge badge-danger">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>

                                        <!-- Delete Modal -->
                                        <div class="modal fade" id="deleteModal{{ $msg_data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Are sure to delete?</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{!! route('admin.about.delete', $msg_data->id) !!}"  method="post">
                                                            {{ csrf_field() }}
                                                            <button type="submit" class="btn btn-danger">Permanent Delete</button>
                                                        </form>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Delete Modal -->
                                    </td>
                                    <td>{{ $msg_data->created_at }}</td>

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
