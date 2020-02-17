@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">File Upload</div>

                <div class="card-body">
                  <form action="{{ route('upload') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <input type="file" name="file" id="" class="form-control" required>
                    </div>
                    <input type="submit" value="Upload" class="btn btn-primary">
                  </form>
                </div>

              @if ($filename ?? '')
                <h5>file: {{ $filename}}</h5>
                <img src="{{ env('AWS_URL') }}/files/{{ $filename }}" alt="" class="img-fluid">
              @endif
            </div>
        </div>
    </div>
</div>
@endsection
