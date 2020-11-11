@extends('backend.layout.main')

@section('content')
    <main>
        <div class="container-fluid">
            <div class="card mb-4 mt-4">
                @include('backend.partials.messages')
                <div class="card-header">
                    <div class="card-tools" style="float: right; margin-top: 5px;">
                        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#user_add_modal">
                            <i class="fa fa-plus"></i>Add user

                        </button>
                    </div>
                    <i class="fas fa-table mr-1"></i>
                    User List
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>@lang('tbl_head.serial_no')</th>
                                <th>@lang('tbl_head.name')</th>
                                <th>@lang('tbl_head.role')</th>
                                <th>@lang('tbl_head.email')</th>
                                <th>@lang('tbl_head.image')</th>
                                <th>@lang('tbl_head.action')</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($all_user as $key => $user)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->usertype }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td><img src="{{ asset('/storage/upload/user/'.$user->image) }}" alt="{{ $user->name }}" class="rounded" style="width:80px; height:80px;"></td>
                                    <td>
                                        <a class="btn btn-warning waves-effect btn-xs" href="{{route('user.edit',$user->id)}}">
                                            <i class="fa fa-edit" aria-hidden="true"></i>
                                        </a>
                                        <a href="#deleteModal{{ $user->id }}" data-toggle="modal" class="btn btn-danger waves-effect btn-xs">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>
                                        <!-- Delete Modal -->
                                        <div class="modal fade" id="deleteModal{{ $user->id }}">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Are sure to delete?</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <form action="{!! route('user.delete', $user->id) !!}"  method="post">
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
                                </tr>

                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="user_add_modal" tabindex="-1" role="dialog"
                 aria-labelledby="user_add_modalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="user_add_modalLabel">Add User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        {!! Form::open([ 'route' => 'user.store', 'method' => 'post', 'id'=>'user_form','class' => 'your_class', 'files' => true ]) !!}

                        @csrf
                        <div class="modal-body">
                            <div class="form-group">

                                <div class="form-group">

                                    <select class="form-control" id="usertype" name="usertype">
                                        <option selected disabled>Please select</option>
                                        <option value="Admin">Admin</option>
                                        <option value="User">User</option>
                                    </select>
                                </div>

                                {!! Form::text('name', null,[ 'class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Enter name']) !!}<br>
                                <span>{{($errors->has('name'))?($errors->first('name')):''}}</span>
                                {!! Form::text('username', null,[ 'class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Enter username']) !!} <br>
                                <span>{{($errors->has('username'))?($errors->first('username')):''}}</span>
                                {!! Form::email('email', null,[ 'class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Enter email']) !!} <br>
                                <span>{{($errors->has('email'))?($errors->first('email')):''}}</span>
                                {{ Form::password('password',array('placeholder'=>'Password','class' => 'form-control','data-validation-required-message' => 'This field is required')) }}
                                <span>{{($errors->has('password'))?($errors->first('password')):''}}</span>
                                <br>
                                <input type="file" class="form-control-file" id="image" name="image">



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

        </div>
    </main>

    <script>

        $(document).ready(function () {

            $('#user_form').validate({
                rules: {
                    usertype: {
                        required: true,
                        usertype: true,
                    },
                    name: {
                        required: true,
                        name: true,
                    },
                    username: {
                        required: true,
                        username: true,
                    },
                    email: {
                        required: true,
                        email: true,
                    },
                    password: {
                        required: true,
                        minlength: 6
                    },

                },
                messages: {
                    usertype: {
                        required: "Please enter a usertype",
                        usertype: "Please enter a usertype"
                    },
                    name: {
                        required: "Please enter your name",
                        name: "Please enter a vaild email address"
                    },
                    username: {
                        required: "Please enter a username",
                        username: "Please enter a username"
                    },
                    email: {
                        required: "Please enter a email address",
                        email: "Please enter a vaild email address"
                    },
                    password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 6 characters long"
                    },
                    image: {
                        required: "Please select a image",
                        minlength: "Choose a jpeg, jpg or png image"
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
        //end jquery area
        function editData(value) {
            $('#editModal').modal('show');
            $('#usertype').val(value.usertype);
            $('#name').val(value.name);
            $('#email').val(value.email);
            $('#username').val(value.username);
            $('#password').val(value.password);
        }
        function deleteData(id) {
            if (confirm('you want delete this. Are you sure ?')) {
                $('#delete-form-' + id).submit();
            } else {
                return false;
            }
        }

    </script>


@endsection
