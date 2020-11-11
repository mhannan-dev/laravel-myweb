@extends('backend.layout.main')

@section('content')
    <main>
        <div class="container-fluid">
            <div class="card mb-4 mt-4">
                @include('backend.partials.messages')
                <div class="card-header">
                    <div class="card-tools" style="float: right; margin-top: 5px;" >
                        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#catg_add_modal"><i class="fa fa-plus"></i>Add {{$title}}</button>
                    </div>
                    <i class="fas fa-table mr-1"></i>
                    {{$title}} List
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>@lang('tbl_head.serial_no')</th>
                                <th>@lang('tbl_head.name')</th>
                                <th>@lang('tbl_head.slug')</th>

                                <th>@lang('tbl_head.action')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($tags))
                                @foreach ($tags as $key => $list)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $list->name }}</td>
                                        <td>{{ $list->slug }}</td>

                                        <td>
                                            <button onclick="return editData({{json_encode($list)}})" class="btn btn-warning waves-effect btn-xs">
                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                            </button>
                                            <button class="btn btn-danger waves-effect btn-xs" onclick="return deleteData({{json_encode($list->id)}})"><i class="fa fa-trash"></i></button>
                                            <form id="delete-form-{{$list->id}}" action="{{url('admin/tag',$list->id)}}" method="post" style="display: none;">
                                                @method('DELETE')
                                                @csrf
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="5"> Opps!!, {{$title}} Not found</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="catg_add_modal" tabindex="-1" role="dialog" aria-labelledby="catg_add_modalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="catg_add_modalLabel">Tag Form</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        {{Form::open(array('route'=>'tag.store','method'=>'POST'))}}
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    {!! Form::label('Name') !!}
                                    {!! Form::text('name', null,[ 'class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Enter name']) !!}
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('form.btn_cancel')</button>
                                <button type="submit" class="btn btn-primary">@lang('form.btn_save')</button>
                            </div>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
            {{--Tag Edit Model--}}
            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="catg_add_modalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="catg_add_modalLabel">Tag Edit</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ url('admin/tag-update')  }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Name <span class="required"></span></label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" required>
                                </div>

                            </div>
                            <input type="hidden" name="tag_id" id="tag_id">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('form.btn_cancel')</button>
                                <button type="submit" class="btn btn-primary">@lang('form.btn_update')</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Modal end -->
        </div>
    </main>

    <script>
        function editData(value){
            $('#editModal').modal('show');
            $('#name').val(value.name);
            //$('#type').val(value.type);
            $('#tag_id').val(value.id);
        }

        function  deleteData(id) {
            if (confirm('you want delete this. Are you sure ?')) {
                $('#delete-form-'+id).submit();
            }else{
                return false;
            }
        }

    </script>
@endsection


