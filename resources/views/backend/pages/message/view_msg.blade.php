@extends('backend.layout.main')
@section('content')
    <main>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header">
                            <h3 class="text-center font-weight-light my-4">View Message</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.message.updateView', $view_msg->id) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label class="small mb-1" for="title">Fullname</label>
                                    <input class="form-control py-4" id="fullname" name="fullname" type="text" value="{{ $view_msg->fullname }}" readonly/>
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="title">Email</label>
                                    <input class="form-control py-4" id="email" name="email" type="text" value="{{ $view_msg->email }}" readonly/>
                                </div>
                                <div class="form-group">
                                    <label for="description">Message</label>
                                    <textarea class="form-control" name="message" id="message" rows="3" readonly>{{ $view_msg->message }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" id="status" name="status">

                                        <option value="1" {{ $view_msg->status == 1 ? 'selected' : '' }}>Seen</option>
                                        <option value="0" {{ $view_msg->status == 0 ? 'selected' : '' }}>Not Seen</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="small mb-1" for="title">Subject</label>
                                    <input class="form-control py-4" id="subject" name="subject" type="text" value="{{ $view_msg->subject }}" readonly/>
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
