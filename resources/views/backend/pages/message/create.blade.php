@extends('backend.layout.main')
@section('content')
    <main>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header">
                            <h3 class="text-center font-weight-light my-4">Add Home Information</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.about.store') }}" method="post">
                                @csrf
                                @include('backend.partials.messages')
                                <div class="form-group">
                                    <label class="small mb-1" for="title">Title</label>
                                    <input class="form-control py-4" id="title" name="title" type="text" placeholder="Enter title" required />
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>

                                    <textarea class="form-control ckeditor" name="description" id="description" cols="80" id="editor1" name="editor1" rows="10" required></textarea>
                                    <script>CKEDITOR.replace( 'editor1' );</script>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" id="status" name="status" required>
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
