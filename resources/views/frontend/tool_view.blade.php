@extends('frontend.layout.master')

@section('content')
<div class="before_heading"></div>
<div class="container-fluid heading_sec">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1>{{ $tool->title ?? ''}}</h1>
        </div>
    </div>
</div>
<div class="rk_body_content">
    <div class="container rk-body-container">

       <div class="row detail_sec">
        <div class="col-md-4">
            <h2>About {{ $tool->title ?? '' }}</h2>
            <a href="{{ $tool->website_link ?? ''}}" target="_blank" class="site_link">VISIT SITE</a>
            
            <button class="price_dv">{{ $tool->price ?? ''}}</button>
            <p><b>Product Information</b></p>
            <div>
                @if(!empty($tool->images[0]))
                <img src="{{ asset('images/frontend/'.$tool->images[0]->images) }}" width="100%" alt="">
                @endif
            </div>
            
        </div>
        <div class="col-md-8 des_sec">
            <h4>What is {{ $tool->title ?? '' }} ? </h4>
            <p>{{ $tool->description ?? ''}}</p>
            <p>{{ $tool->use_case1 ?? ''}}</p>
            <p>{{ $tool->use_case2 ?? ''}}</p>
            <p>{{ $tool->use_case3 ?? ''}}</p>
        </div>
       </div>

    </div>
</div>
@endsection