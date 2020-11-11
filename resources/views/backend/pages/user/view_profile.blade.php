@extends('backend.layout.main')
@section('title')
    Update Profile
@endsection
@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/profile.css') }}">
@endpush

@section('content')
    <main>
        <div class="container-fluid">
            <div class="row justify-content-md-center">
                <div class="col-md-8-auto">
                    <div class="text-center card-box">
                        <div class="member-card pt-2 pb-2">
                            <div class="thumb-lg member-thumb mx-auto">
                                <img src="{{(!empty(($user->image))?url('/storage/'.$user->image):url('/storage/upload/user/no_image.png'))}}" class="rounded-circle img-thumbnail" alt="profile-image" style="height: 200px; width: 200px;">
                            </div>
                            <div class=""><h4>{{ $user->name }}</h4></div>
                            <p>{{ $user->address }}</p>
                            <div class="mt-4">
                                <div class="row">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Mobile</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Gender</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>{{ $user->mobile }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->gender }}</td>
                                            <td><a href="{{ route('user.profile.edit',$user->id ) }}" class="badge badge-danger">Edit</a></td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        </div>
    </main>

@endsection


