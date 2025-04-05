@extends('layout.layout')

@section('content')
        <div class="row justify-content-center">
        <div class="col-12 col-sm-8 col-md-6 mt-5">
            <form action="{{route('register')}}" method="post" class="needs-validation form" novalidate>
                @csrf
                <h3 class="text-center text-dark">Register</h3>
                <div class="form-group">
                    <label for="txtName" class="text-dark">Name:</label><br>
                    <input type="text" name="txtName" id="txtName" class="form-control" value="{{old('txtName')}}" required />
                    @error('txtName')
                        <span class="fs-6 text-danger">{{str_replace("txt", "", $message)}}</span>
                    @enderror
                    <div class="invalid-feedback">Please enter name</div>
                </div>
                <div class="form-group mt-3">
                    <label for="txtEmail" class="text-dark">Email:</label><br>
                    <input type="email" name="txtEmail" id="txtEmail" class="form-control" value="{{old('txtEmail')}}" required />
                    @error('txtEmail')
                        <span class="fs-6 text-danger">{{str_replace("txt", "", $message)}}</span>
                    @enderror
                    <div class="invalid-feedback">Please enter email</div>
                </div>
                <div class="form-group mt-3">
                    <label for="password" class="text-dark">Password:</label><br>
                    <input type="password" name="password" id="password" class="form-control" value="" required />
                    @error('password')
                        <span class="fs-6 text-danger">{{$message}}</span>
                    @enderror
                    <div class="invalid-feedback">Please enter password</div>
                </div>
                <div class="form-group mt-3">
                    <label for="confirm_password" class="text-dark">Confirm Password:</label><br>
                    <input type="password" name="password_confirmation" id="confirm_password" class="form-control" value="" required />
                    @error('password_confirmation')
                        <span class="fs-6 text-danger">{{$message}}</span>
                    @enderror
                    <div class="invalid-feedback">Please enter confirm password</div>
                </div>
                <div class="form-group mt-3 ">
                    <button type="submit" class="btn btn-dark btn-md"> Submit </button>
                </div>
                <div class="text-right mt-2">
                    <a href="/login" class="text-dark">Login here</a>
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
