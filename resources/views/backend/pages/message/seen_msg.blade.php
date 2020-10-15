@extends('backend.layout.main')
@section('content')
    <main>
        <div class="container-fluid">
            <div class="card mb-4 mt-4">
                @include('backend.partials.messages')
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Seen Message Box
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


                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>SL</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Date</th>

                            </tr>
                            </tfoot>
                            <tbody>

                            @foreach ($data as $msg_data)

                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $msg_data->fullname }}</td>


                                    <td>{{ $msg_data->email }}</td>
                                    <td>{{ $msg_data->subject }}</td>

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
