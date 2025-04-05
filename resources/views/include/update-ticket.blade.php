@include('include.success-message')

<h4>View Ticket</h4>

<hr>

<div class="row">

    <form action="{{route('tickets.update', $ticket->id)}}" method="post">
        @csrf
        @method('put')

        <div class="mb-3">
            <span><strong>Title:</strong> {{$ticket->title}}</span>
        </div>
        <div class="mb-3">
            <span><strong>Description:</strong> {{$ticket->description}}</span>
        </div>
        <div class="mb-3">
            <span><strong>Priority:</strong> {{$ticket->priority}}</span>
        </div>
        <div class="mb-3">
            <span><strong>Created On:</strong> {{$ticket->created_at}}</span>
        </div>
        <div class="mb-3">
            <span><strong>Created By:</strong> {{$ticket->createdby}}</span>
        </div>

        @if($ticket->status == '1')
            <div class="mb-3">
                <span><strong>Status:</strong> Closed</span>
            </div>
            <div class="mb-3">
                <span><strong>Closed On:</strong> {{$ticket->updated_at}}</span>
            </div>
            <div class="mb-3">
                <span><strong>Closed By:</strong> {{$ticket->updatedBy}}</span>
            </div>

            <div class="">
                <a href="/tickets" type="button" class="btn btn-dark"> Back </a>
            </div>
        @else
            <div class="mb-3">
                <select class="form-select" name="selStatus" id="selStatus">
                    <option value="">Status</option>
                    <option value="0" @if($ticket->status == '0') selected @endif>Open</option>
                    <option value="1" @if($ticket->status == '1') selected @endif>Closed</option>
                </select>
                @error('selStatus')
                    <span class="fs-6 text-danger">{{str_replace("sel", "", $message)}}</span>
                @enderror
            </div>

            <div class="">
                <button type="submit" class="btn btn-dark"> Update </button>
            </div>
        @endif

    </form>



</div>
