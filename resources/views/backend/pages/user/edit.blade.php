@extends('backend.layout.main')

@section('content')
    <main>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header">
                            <h3 class="text-center font-weight-light my-4">Update User</h3>
                        </div>
                        <div class="card-body">

                            {!! Form::open([ 'route' => ['user.update', $editData->id], 'method' => 'post', 'files' => true ]) !!}
                            @csrf
                            <div class="form-group">
                                <label for="status">Please select usertype</label>
                                <select class="form-control" id="usertype" name="usertype" required>
                                    <option value="Admin"{{($editData->usertype=="Admin")?"selected":""}}>Admin</option>
                                    <option value="User"{{($editData->usertype=="User")?"selected":""}}>User</option>
                                </select>

                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="name">Name</label>
                                <input class="form-control py-4" id="name" name="name" type="text" value="{{ $editData->name }}" required/>

                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="name">Username</label>
                                <input class="form-control py-4" id="username" name="username" type="text" value="{{ $editData->username }}" required/>

                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="name">Email</label>
                                <input class="form-control py-4" id="email" name="email" type="text" value="{{ $editData->email }}" required/>

                            </div>
                            <div class="form-group">
                                <label for="image">Update Image</label>
                                <input type="file" class="form-control-file" id="image" name="image">

                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="name">Password (Optional)</label>
                                <input class="form-control py-4" id="password" name="password" type="password" value="{{ $editData->password }}" required/>

                            </div>
                            <br>

                            <div class="form-group mt-4 mb-0">
                                <button type="submit" class="btn btn-primary btn-block">Save</button>
                            </div>

                            {!! Form::close() !!}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection


