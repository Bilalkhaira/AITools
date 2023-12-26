@extends('frontend.layout.master')

@section('content')
<div class="rk_form_submit">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="rk_form_list">
                    <div class="symbol symbol-100px symbol-circle mb-7 text-center">
                        @if(auth()->user()->profile_photo_path)
                        <img id="profileImg" src="{{ asset('images/frontend/profile/'.auth()->user()->profile_photo_path) }}" alt="image" />
                        @else
                        <img src="{{ asset('images/frontend/person.png') }}" alt="image" />
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <p><b>{{ auth()->user()->name }}</b></p>
                            <p>{{ auth()->user()->email }}</p>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <a class="btn active" href="{{ route('edit-profile') }}" type="button"><i
                                    class="fa-solid fa-edit"></i>Edit</a>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>

</div>
@endsection