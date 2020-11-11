@extends('backend.layout.main')

@section('content')
    <main>
        <div class="container-fluid">
            <div class="card mb-4 mt-4">
                @include('backend.partials.messages')
                <div class="card-header">

                        <div class="card-tools" style="float: right; margin-top: 5px;">
                            @if($countLogo < 1)
                            <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#catg_add_modal"><i
                                    class="fa fa-plus"></i>Add
                            </a>
                            @endif
                        </div>

                    <i class="fas fa-table mr-1"></i>
                    Site Information
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>@lang('tbl_head.serial_no')</th>
                                <th>@lang('tbl_head.image')</th>
                                <th>@lang('tbl_head.footer_text')</th>

                                <th>@lang('tbl_head.action')</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($data as $key => $list)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td><img
                                            src="{{(!empty(($list->logo))?url('/storage/upload/logo/'.$list->logo):url('/storage/upload/user/no_image.png'))}}"
                                            alt="Logo" style="width: 150px; height: 150px"></td>
                                    <td>{{ $list->footer_text }}</td>
                                    <td>
                                        <a onclick="return editData({{json_encode($list)}})" class="btn btn-warning waves-effect btn-xs">
                                            <i class="fa fa-edit" aria-hidden="true"></i>
                                        </a>


                                        {{ Form::open(['method' => 'POST', 'route' => ['admin.delete.settings',$list->id]]) }}
                                        {{ Form::hidden('id',$list->id) }}
                                        <button type="submit" class="btn btn-danger waves-effect btn-xs"><i class="fa fa-trash"></i></button>
                                        {{ Form::close() }}



                                    </td>
                                </tr>


                            @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="catg_add_modal" tabindex="-1" role="dialog"
                 aria-labelledby="catg_add_modalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="catg_add_modalLabel">Add Information</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>


                        {!! Form::open([ 'route' => ['admin.store.settings'], 'id'=>'quickForm', 'method' => 'post', 'files' => true ]) !!}
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">

                                {!! Form::label('Logo') !!} <br>
                                {!! Form::file('logo', null,[ 'class' => 'form-control-file mb-2', 'data-validation-required-message' => 'This field is required']) !!}<br>

                                {!! Form::label('Footer Information') !!}
                                {!! Form::text('footer_text', null,[ 'class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Enter footer information']) !!}
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">@lang('form.btn_cancel')</button>
                            <button type="submit" class="btn btn-primary">@lang('form.btn_save')</button>
                        </div>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
            {{--Tag Edit Model--}}
            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="catg_add_modalLabel"
                 aria-hidden="true">
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
                                    <input type="text" name="name" id="name" class="form-control"
                                           placeholder="Enter Name" required>
                                </div>

                            </div>
                            <input type="hidden" name="tag_id" id="tag_id">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">@lang('form.btn_cancel')</button>
                                <button type="submit" class="btn btn-primary">@lang('form.btn_update')</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Modal end -->
        </div>
    </main>

    <script type="text/javascript">
        $(document).ready(function () {
            $.validator.setDefaults({
                submitHandler: function () {
                    alert( "Form successful submitted!" );
                }
            });
            $('#quickForm').validate({
                rules: {
                    logo: {
                        required: true,
                        logo: true,
                    },
                    footer_text: {
                        required: true,
                        footer_text: true
                    },

                },
                messages: {
                    logo: {
                        required: "Please select a logo",
                        email: "Please select a logo"
                    },
                    footer_text: {
                        required: "Enter footer information",
                        footer_text: "Enter footer information"
                    },

                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
        function editData(value){
            $('#editModal').modal('show');
            $('#name').val(value.name);
            //$('#type').val(value.type);
            $('#tag_id').val(value.id);
        }

    </script>
@endsection


