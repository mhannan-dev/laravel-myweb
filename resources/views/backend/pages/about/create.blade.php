@extends('backend.layout.main')
@section('content')
    <main>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header">
                            <h3 class="text-center font-weight-light my-4">Add About Info</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin_about_store') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label class="small mb-1" for="title">Title</label>
                                    <input class="form-control py-4" id="title" name="title" type="text" placeholder="Enter title" />
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                                </div>
                                <div class="form-group mt-4 mb-0">
                                    <button type="submit" class="btn btn-primary btn-block">Save</button>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
