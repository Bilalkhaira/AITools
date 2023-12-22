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
                    <form action="{{ route('signup.store') }}" method="POST">
                        @csrf
                        <h3>Register</h3>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Full Name</label>
                            <input type="text" name="name" class="form-control" id="exampleFormControlInput1"
                                placeholder="Enter Your Full Name" value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="colorRed">{{ $message }}</div>
                                @enderror
                        </div>



                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">User Name</label>
                            <input type="text" name="user_name" class="form-control" id="exampleFormControlInput1"
                                placeholder="Enter Your User Name" value="{{ old('user_name') }}" required>
                                @error('user_name')
                                <div class="colorRed">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="exampleFormControlInput1"
                                placeholder="Enter Your Email" value="{{ old('email') }}" required>
                                @error('email')
                                <div class="colorRed">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleFormControlInput1"
                                placeholder="Enter Your Password" value="{{ old('password') }}" required>
                                @error('password')
                                <div class="colorRed">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="mb-3" id="rkFromListsubmitNew">

                            <input class="form-control" type="submit" value="Create Account">
                        </div>

                        <div class="mb-3" id="siginupBtn">
                            <a href="{{ route('signin') }}">Or Signin Using</a>
                        </div>


                        <!-- <div class="mb-3" id="rkFacebookLink">

                            <img src="{{ asset('images/frontend/facebook.png') }}"><input class="form-control" type="button"
                                value="Continue With Facebook">
                        </div>


                        <div class="mb-3" id="rkGoogleLink">

                            <img src="{{ asset('images/frontend/google.png') }}"><input class="form-control" type="button"
                                value="Continue With Google">
                        </div> -->

                    </form>



                </div>
                <!-- End rk form list -->
            </div>

        </div>

    </div>

</div>
@endsection