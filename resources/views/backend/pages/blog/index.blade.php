@extends('backend.layout.main')
@section('content')
<main>
    <div class="container-fluid">
        <div class="card mb-4 mt-4">
            @include('backend.partials.messages')
            <div class="card-header">
                <div class="card-tools" style="float: right; margin-top: 5px;">
                    <a class="btn btn-info btn-sm" href="{{route('admin.blog.create')}}"><i class="fa fa-plus"></i>Add</a>

                </div>
                <i class="fas fa-table mr-1"></i>
                All Posts

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Title</th>
                                <th>Slug</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Tag</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                                <th>Date</th>

                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($data as $post)

                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>{!! Str::limit($post->title, 30) !!}</td>
                                <td>{!! Str::limit($post->slug, 30) !!}</td>
                                <td>{!! Str::limit($post->body, 100) !!}</td>
                                <td>{!! $post->categories->name !!} </td>
                                <td>{!! $post->tags->name !!}</td>
                                <td>
                                    <img src="{{ asset('/storage/upload/'.$post->image) }}" alt="{{ $post->title }}" class="rounded" style="width:80px; height:80px;">
                                </td>
                                <td>
                                    @if($post->status == 1)

                                        <span class="badge badge-success">Published</span>
                                        @else

                                        <span class="badge badge-warning">Draft</span>
                                        @endif

                                </td>
                                <td>
                                    <a href="{{ route('admin.blog.edit', $post->id) }}" class="badge badge-success">
                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                    </a>

                                    <a href="#deleteModal{{ $post->id }}" data-toggle="modal" class="badge badge-danger">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>

                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="deleteModal{{ $post->id }}">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Are sure to delete?</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{!! route('admin.blog.delete', $post->id) !!}" method="post">
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
                                <td>{{ $post->created_at }}</td>

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
