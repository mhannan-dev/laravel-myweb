@extends('backend.layout.main')
@section('content')
    <main>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header">
                            <h3 class="text-center font-weight-light my-4">Update Post</h3>
                        </div>
                        <div class="card-body">

                                {!! Form::open([ 'route' => ['admin.blog.update',$data_list->id], 'method' => 'post', 'files' => true ]) !!}
                                @csrf
                                <div class="form-group">
                                    <label for="status">Please select category</label>
                                    <select class="form-control" id="category_id" name="category_id" required>
                                        <option>Please select category</option>

                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" {{ $category->id == $data_list->category_id ? 'selected' : '' }}>{{ $category->name }}</option>

                                            @endforeach





                                    </select>

                                </div>

                                <div class="form-group">
                                    <label for="tag">Select Tag</label>
                                    <select class="form-control" id="tag_id" name="tag_id" required>
                                        <option>Please select tag</option>
                                        @foreach($tags as $tag_row)

                                            <option value="{{ $tag_row->id }}" {{ $tag_row->id == $data_list->tag_id ? 'selected' : '' }}>{{ $tag_row->name}}</option>
                                        @endforeach


                                    </select>


                                </div>

                                <div class="form-group">
                                    <label class="small mb-1" for="title">Title</label>
                                    <input class="form-control py-4" id="title" name="title" type="text"
                                           value="{{ $data_list->title }}" required/>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Update Image</label>
                                    <input type="file" class="form-control-file" id="image" name="image">

                                </div>
                                <br>


                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control ckeditor" name="body" id="body" cols="80" id="editor1"
                                              name="editor1" rows="10" required>{{ $data_list->body }}</textarea>
                                    <script>CKEDITOR.replace('editor1');</script>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" id="type" name="status" required>
                                        <option>Please select status</option>
                                        <option value="1">Publish</option>
                                        <option value="0">Draft</option>

                                    </select>
                                </div>



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
