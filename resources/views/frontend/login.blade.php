@extends('frontend.layout.master')
@push('css')
<style type="text/css">
.rk-header-row {
    height: 151px;

}

.rk_header {
    border-bottom: 1px solid #888E93;
    height: 153px;
}



#rk_radio_box input {
    height: 16px;
    background-color: #C3C6C8;

}

#rk_radio_box .form-check-inline label {
    color: #C3C6C8;
}

#rkFromListsubmit input[type='submit'] {
    color: #56ABF4;
    border: 2px solid #56ABF4;
    font-weight: bold;
}
</style>
@endpush
@section('content')
<div class="rk_form_submit">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="rk_form_list">
                    <form method="POST" action="{{ route('signin.store') }}">
                        @csrf
                        <h3>Login</h3>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Name or Email Address</label>
                            <input type="text" name="email" class="form-control" id="exampleFormControlInput1"
                                placeholder="Enter Your Name or Email" value="{{ old('name') }}" required>
                                @error('email')
                                    <div class="colorRed">{{ $message }}</div>
                                @enderror
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Password</label>
                            <input name="password" type="password" class="form-control" id="exampleFormControlInput1"
                                placeholder="Enter Your Password" value="{{ old('password') }}" required>
                                @error('password')
                                    <div class="colorRed">{{ $message }}</div>
                                @enderror

                        </div>


                        <div class="mb-3" id="rkLoginSubmit">

                            <input class="form-control" type="submit" value="Login">
                        </div>

                        <div class="mb-3" id="siginupBtn">
                            <a href="{{ route('signup') }}">Or Signup Using</a>
                        </div>


                        <!-- <div class="mb-3" id="rkFacebookLink">

                            <img src="{{ asset('images/frontend/facebook.png') }}"><input class="form-control" type="button"
                                value="Continue With Facebook">
                        </div>


                        <div class="mb-3" id="rkGoogleLink">

                            <img src="{{ asset('images/frontend/google.png') }}"><input class="form-control" type="button"
                                value="Continue With Google">
                        </div> -->

                        <p class="lost_password"><a href="#">Lost Your Password?</a></p>

                    </form>



                </div>
                <!-- End rk form list -->
            </div>

        </div>

    </div>

</div>
@endsection