@extends('layout.layout')

@section('content')

    <div class="row">
        <div class="col-3">
            @include('layout.left-section')
        </div>
        <div class="col-6">

            @include('include.update-ticket')

        </div>
    </div>
@endsection
