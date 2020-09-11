@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="text-center">
                        <img src="storage/profile_pix/{{ Auth::user()->avatar}}" alt="profile picture" style="width:250px;height: 250px;" class="img-thumbnail" />
                        <p><strong>{{ Auth::user()->name }} ({{ Auth::user()->email }})</strong></p>
                    </div>
                    <form  enctype="multipart/form-data" action="{{ route('uploadPhoto') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-12">
                                <br><input type="file" class="form-control" name="avatar">
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-primary" value="upload">Upload Image</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
