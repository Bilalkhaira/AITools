@extends('frontend.layout.master')
@section('content')
<div class="rk_form_submit">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="rk_form_list">
                    <form method="POST" action="{{ route('update-profile') }}" enctype="multipart/form-data">
                        @csrf
                        <h3> Edit Profile</h3>

                        <div class="mb-3" id="rkformFileMultipl">
                            <label for="formFileMultiple" class="form-label">Upload Profile</label>
                            <input class="form-control" type="file" name="profile_photo" id="formFileMultiple" multiple>
                            <span>Maximum file size: 1MB</span>

                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Name</label>
                            <input type="text" name="name" value="{{ auth()->user()->name }}" class="form-control"
                                id="exampleFormControlInput1" required>
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Email</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" name="email"
                                value="{{ auth()->user()->email }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Current Password</label>
                            <input type="password" class="form-control" name="current_password">
                            <input type="hidden" value="{{ auth()->user()->id }}" name="updateId">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">New Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>


                        <div class="mb-3">
                            <label class="form-label">Confrim Password</label>
                            <input type="password" class="form-control" name="confirmpassword">
                        </div>


                        <div class="mb-3" id="rkProfileLoginSubmit">

                            <input class="form-control" type="submit" value="Submit">
                        </div>


                    </form>



                </div>
                <!-- End rk form list -->
            </div>

        </div>

    </div>

</div>
@endsection