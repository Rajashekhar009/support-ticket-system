@extends('layout.layout')

@section('content')

    <div class="row">
        <div class="col-3">
            @include('layout.left-section')
        </div>
        <div class="col-6">

            @include('include.create-ticket')

        </div>
    </div>
@endsection
