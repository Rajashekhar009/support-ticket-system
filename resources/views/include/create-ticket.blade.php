@include('include.success-message')

<h4>Create Ticket</h4>
<div class="row">
    <form action="{{route('tickets.store')}}" method="post" class="needs-validation" novalidate>
        @csrf

        <div class="mb-3">
            <label for="txtTitle" class="text-dark">Title:</label><br>
            <input type="text" class="form-control" name="txtTitle" id="txtTitle" placeholder="Title" value="{{old('txtTitle')}}" required />
            @error('txtTitle')
                <span class="fs-6 text-danger">{{str_replace("txt", "", $message)}}</span>
            @enderror
            <div class="invalid-feedback">Please enter Title</div>
        </div>
        <div class="mb-3">
            <label for="txtDescription" class="text-dark">Description:</label><br>
            <textarea class="form-control" name="txtDescription" id="txtDescription" rows="3" placeholder="Description" required>{{old('txtDescription')}}</textarea>
            @error('txtDescription')
                <span class="fs-6 text-danger">{{str_replace("txt", "", $message)}}</span>
            @enderror
            <div class="invalid-feedback">Please enter Description</div>
        </div>
        <div class="mb-3">
            <label for="selPriority" class="text-dark">Priority:</label><br>
            <select class="form-select" name="selPriority" id="selPriority" required>
                <option value="">Priority</option>
                <option value="Critical" @if(old('selPriority') == 'Critical') selected @endif>Critical</option>
                <option value="High" @if(old('selPriority') == 'High') selected @endif>high</option>
                <option value="Medium" @if(old('selPriority') == 'Medium') selected @endif>Medium</option>
                <option value="Low" @if(old('selPriority') == 'Low') selected @endif>Low</option>
            </select>
            @error('selPriority')
                <span class="fs-6 text-danger">{{str_replace("sel", "", $message)}}</span>
            @enderror
            <div class="invalid-feedback">Please select Priority</div>
        </div>
        <div class="">
            <button type="submit" class="btn btn-dark"> Submit </button>
        </div>
    </form>
</div>

<script>
   // Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
</script>
