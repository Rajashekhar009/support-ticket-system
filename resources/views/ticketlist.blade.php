@extends('layout.layout')

@section('content')

    <div class="row">
        <div class="col-3">
            @include('layout.left-section')
        </div>
        <div class="col-8">

            <div class="d-flex">
                <div class="me-auto p-2 bd-highlight"><h4>Tickets List</h4></div>
                <div class="p-2 bd-highlight">
                    <a href="{{route('tickets.create')}}" class="btn btn-dark"> Create Ticket </a>
                </div>
            </div>
            <hr>
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">S.No</th>
                <th scope="col">Title</th>
                <th scope="col">Priority</th>
                <th scope="col">Status</th>
                <th scope="col">Created On</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($tickets as $ticket)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $ticket->title }}</td>
                    <td>{{ $ticket->priority }}</td>
                    <td>{{ ($ticket->status==0) ? 'Open':'Closed' }}</td>
                    <td>{{ $ticket->created_at }}</td>
                    <td class="d-flex">
                        <form method="post" action="{{route('tickets.destroy', $ticket->id)}}">
                            @csrf
                            @method('delete')
                            <button title="Delete" class="btn"><i class="fas fa-trash-alt"></i></button>
                        </form>
                        <a href="{{ route('tickets.show',$ticket->id)}}" class="btn"><i class="fas fa-edit"></i></a>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="mt-3">
            {{ $tickets->links()}}
           </div>


        </div>
    </div>
@endsection
