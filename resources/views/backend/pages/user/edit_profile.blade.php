@extends('backend.layout.main')

@section('content')
    <main>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <a href="{{route('user.profile.view')}}" class="btn btn-dark">Your Profile</a>
                        <div class="card-header">
                            <h3 class="text-center font-weight-light my-4">Update Profile</h3>
                        </div>
                        <div class="card-body">

                            {!! Form::open([ 'route' => ['user.profile.update', $editData->id], 'method' => 'post', 'files' => true ]) !!}
                            @csrf
                            <div class="form-group">
                                <label for="status">Please select gender</label>
                                <select class="form-control" id="gender" name="gender" required>
                                <option value="Male"{{($editData->gender=="Male")?"selected":""}}>Male</option>
                                <option value="Female"{{($editData->gender=="Female")?"selected":""}}>Female</option>
                                </select>

                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="name">Name</label>
                                <input class="form-control py-4" id="name" name="name" type="text" value="{{ $editData->name }}" required/>


                            </div>

                            <div class="form-group">
                                <label class="small mb-1" for="name">Email</label>
                                <input class="form-control py-4" id="email" name="email" type="text" value="{{ $editData->email }}" required/>

                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="name">Mobile No</label>
                                <input class="form-control py-4" id="mobile" name="mobile" type="text" value="{{ $editData->mobile }}" required/>

                            </div>

                            <div class="form-group">
                                <label class="small mb-1" for="name">Address</label>
                                <input class="form-control py-4" id="address" name="address" type="text" value="{{ $editData->address }}" required/>

                            </div>
                            <div class="form-group">
                                <label for="image">Update Image</label>
                                <input type="file" class="form-control-file" id="image" name="image" value="{{ $editData->image }}">

                            </div>

                            <div class="form-group">
                                <img id="showImage" src="{{(!empty(($editData->image))?url('/storage/'.$editData->image):url('/storage/upload/user/no_image.png'))}}" class="rounded-circle img-thumbnail" alt="{{$editData->name}}" style="height: 150px; width: 150px; border: 2px solid #000019">
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
