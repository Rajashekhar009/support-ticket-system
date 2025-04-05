@extends('layout.layout')

@section('content')
    <div class="row">
        <div class="col-3">
            @include('layout.left-section')
        </div>
        <div class="col-8 border">
            <div class="mt-2">
                <h4 class="text-center text-dark">Profile Details</h3>
                    <hr>
                <div class="form-group">
                    <label class="text-dark fw-bold">Name:</label><br>
                    <span>{{Auth::user()->name}}</span>
                </div>
                <div class="form-group mt-3">
                    <label class="text-dark fw-bold">Email:</label><br>
                    <span>{{Auth::user()->email}}</span>
                </div>
                <div class="form-group mt-3">
                    <label class="text-dark fw-bold">Created On:</label><br>
                    <span>{{Auth::user()->created_at}}</span>
                </div>
                <div class="mt-3"></div>
        </div>
    </div>
    </div>
@endsection
