@extends('backend.layout.main')
@section('content')
    <main>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header">
                            <h3 class="text-center font-weight-light my-4">Manage Password</h3>
                        </div>
                        <div class="card-body">

                                {!! Form::open([ 'route' => ['user.profile.password_update', $data->id], 'id'=>'password_change_form', 'method' => 'post']) !!}
                                @csrf

                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="current_password">Current password</label>
                                            <input type="password" name="current_password" class="form-control" id="current_password" placeholder="Enter current password">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="new_password">New password</label>
                                            <input type="password" name="new_password" class="form-control" id="new_password" placeholder="Enter new password">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="again_new_password">Confirm password</label>
                                            <input type="password" name="again_new_password" class="form-control" id="again_new_password" placeholder="Confirm new password">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                            {!! Form::close() !!}

                        </div>

                    </div>
                </div>


            </div>
        </div>
    </main>

    <script>
        $(document).ready(function () {
            $('#password_change_form').validate({
                rules: {
                    current_password: {
                        required: true,
                    },
                    new_password: {
                        required: true,
                        minlength: 6
                    },
                    again_new_password: {
                        required: true,
                        equalTo: '#new_password'
                    },

                },
                messages: {
                    current_password: {
                        required: "Please provide current password",
                    },
                    new_password: {
                        required: "Please provide new password",
                        minlength: "Your password must be at least 6 characters long"
                    },
                    again_new_password: {
                        required: "Please provide new password",
                        minlength: "Your password must be at least 6 characters long"
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
    </script>
@endsection


