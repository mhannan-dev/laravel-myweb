@extends('backend.layout.main')
@section('content')
    <main>
        <div class="container-fluid">
            <div class="card mb-4 mt-4">
                @include('backend.partials.messages')
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Service Data
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Icon</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Action</th>
                                <th>Start date</th>

                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>SL</th>
                                <th>Icon</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Action</th>
                                <th>Start date</th>
                            </tr>
                            </tfoot>
                            <tbody>

                            @foreach ($data as $service_data)

                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $service_data->icon }}</td>
                                <td>{{ $service_data->title }}</td>
                                <td>{{ $service_data->description }}</td>
                                <td>
                                @if($service_data->status == 0)

                                    <span class="badge badge-warning">Draft</span>
                                @else
                                     <span class="badge badge-success">Published</span>
                                @endif

                                </td>
                                <td>
                                    <a href="{{ route('admin.service.edit', $service_data->id) }}" class="badge badge-success">
                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                    </a>

                                       <a href="#deleteModal{{ $service_data->id }}" data-toggle="modal" class="badge badge-danger">
                                           <i class="fa fa-trash" aria-hidden="true"></i>
                                       </a>

                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="deleteModal{{ $service_data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Are sure to delete?</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{!! route('admin.service.delete', $service_data->id) !!}"  method="post">
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
                                <td>{{ $service_data->created_at }}</td>

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
