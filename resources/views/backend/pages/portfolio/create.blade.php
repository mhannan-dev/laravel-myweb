@extends('backend.layout.main')
@section('content')
    <main>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header">
                            <h3 class="text-center font-weight-light my-4">Add Portfilo</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.portfolio.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">


                                    <label for="status">Please select category</label>
                                    <select class="form-control" id="category_id" name="category_id" required>
                                    <option>Please select category</option>

                                    @foreach($categories as $category_row)

                                    <option value="{{ $category_row->id }}">{{ $category_row->name }}</option>
                                    @endforeach

                                      </select>
                                </div>


                                <div class="form-group">
                                    <label class="small mb-1" for="title">Title</label>
                                    <input class="form-control py-4" id="title" name="title" type="text" placeholder="Enter title" required/>
                                </div>

                                <div class="form-group">
                                    <label class="small mb-1" for="title">Link</label>
                                    <input class="form-control py-4" id="link" name="link" type="text" placeholder="Enter link" required/>
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Attach Image</label>
                                    <input type="file" class="form-control-file" id="image" name="image">
                                </div>

                                <div class="form-group">
                                    <label for="type">Status</label>
                                    <select class="form-control" id="type" name="type" required>
                                        <option>Please select status</option>
                                        <option value="1">Publish</option>
                                        <option value="0">Draft</option>

                                    </select>
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
