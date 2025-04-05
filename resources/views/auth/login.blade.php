@extends('layout.layout')

@section('content')

        <div class="row justify-content-center">
        <div class="col-12 col-sm-8 col-md-6 mt-5">
            <form action="{{route('login')}}" method="post" class="needs-validation form" novalidate>
                @csrf

                <h3 class="text-center text-dark">Login</h3>

                    @if($errors->has('credentials'))
                    <div class="form-group">
                        <span class="fs-6 text-danger">{{ $errors->first('credentials') }}</span>
                    </div>
                    @endif

                    <div class="form-group">
                        <label for="email" class="text-dark">Email:</label><br>
                        <input type="email" name="email" id="email" class="form-control" required />
                        @error('email')
                            <span class="fs-6 text-danger">{{$message}}</span>
                        @enderror
                        <div class="invalid-feedback">Please enter email</div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="password" class="text-dark">Password:</label><br>
                        <input type="password" name="password" id="password" class="form-control" required />
                        @error('password')
                            <span class="fs-6 text-danger">{{$message}}</span>
                        @enderror
                        <div class="invalid-feedback">Please enter password</div>
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" name="submit" class="btn btn-dark btn-md"> Submit </button>
                    </div>
                    <div class="text-right mt-2">
                        <a href="/register" class="text-dark">Register here</a>
                    </div>
            </form>
        </div>
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
@endsection




