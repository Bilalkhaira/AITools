@extends('frontend.layout.master')

@section('content')
<div class="rk_header_banner">
    <div class="container rk-container">
        <div class="row rk_welcome_img">
            <div class="col-12">
                @if(auth()->user()->profile_photo_path)
                <img id="profileImg" src="{{ asset('images/frontend/profile/'.auth()->user()->profile_photo_path) }}"
                    alt="image" />
                @else
                <img src="{{ asset('images/frontend/profile_img.png') }}">
                @endif
                <div>
                    <h3><b>{{ auth()->user()->name ?? '' }}</b></h3>
                </div>

            </div>
        </div>
        <div class="row rk_profile_button">

            <ul class="nav nav-pills " role="tablist">
                <li class="nav-item">
                    <button class="btn active" data-toggle="pill" href="#home" type="button"><i
                            class="fa-solid fa-turn-up"></i>Publish
                        Tools</button>
                </li>
                <li class="nav-item">
                    <button class="btn" data-toggle="pill" href="#menu1" type="button"><i
                            class="fa-solid fa-code-compare"></i>Favorite
                        Tool</button>
                </li>

            </ul>
        </div>

        <div class="row rk_welcome_toll">
            <div class="col-12">
                <!-- <h3>Tool Submited</h3> -->
                <!-- <button class="btn">More Tools</button> -->
            </div>
        </div>

    </div>
</div>



<div class="rk_body_content">
    <div class="container rk-body-container">

        <div class="tab-content">
            <div id="home" style="background-color: transparent !important" class="tab-pane active">
                <h3>Publish Tools</h3>
                <div class="row">
                    @if(!empty($tools))
                    @foreach($tools as $tool)
                    <div class="col-3 col-md-4 tool_editBtn_main">
                        <div id="tool_editBtn">
							<a href="{{ route('delete.tool', $tool->id) }}" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></a>
							<a href="{{ route('edit.tool', $tool->id) }}"><i class="fa fa-edit"></i></a>
							<a href="{{ route('tool.show', $tool->id) }}"><i class="fa fa-eye"></i></a>
						</div>
                        <div class="rk_head_post_img">
                            @if(!empty($tool->images[0]))
                            <img src="{{ asset('images/frontend/'.$tool->images[0]->images) }}">
                            @endif
                            <div class="rk_post_title">
                                <h4>{{ $tool->title ?? ''}}</h4>
                                <button class=""> {{ $tool->price ?? ''}}</button>
                            </div>
                            <div class="rk_post">
                                <p>{{ Illuminate\Support\Str::limit($tool->description, 100)}}</p>
                            </div>
                            <div class="rk_post_bottom">
                                <button class="">#SEO</button>
                                <button class="">#Keywords</button>

                                <div class="rk_bottom">
                                    <i class="fa-solid fa-code" style="color:#fff;"></i>

                                </div>
                                <div class="rk_bottom rk_heart_img_icon">
                                    <img src="{{ asset('images/frontend/heart.png') }}" style="color:#fff;">

                                </div>

                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif

                </div>

            </div>
            <div id="menu1" style="background-color: transparent !important" class="container tab-pane fade"><br>
                <h3>Favorite Tools</h3>
                <div class="row">
                    @if(!empty($favorite_tools))
                    @foreach($favorite_tools as $tool)
                    <div class="col-3 col-md-4">

                        <div class="rk_head_post_img">
                            @if(!empty($tool->images[0]))
                            <img src="{{ asset('images/frontend/'.$tool->images[0]->images) }}">
                            @endif
                            <div class="rk_post_title">
                                <h4>{{ $tool->title ?? ''}}</h4>
                                <button class=""> {{ $tool->price ?? ''}}</button>
                            </div>
                            <div class="rk_post">
                                <p>{{ Illuminate\Support\Str::limit($tool->description, 100)}}</p>
                            </div>
                            <div class="rk_post_bottom">
                                <button class="">#SEO</button>
                                <button class="">#Keywords</button>

                                <div class="rk_bottom">
                                <a href="{{ route('tool.show', $tool->id)}}"><i style="color:#fff;" class="fa fa-eye"></i></a>

                                </div>
                                <div class="rk_bottom rk_heart_img_icon">
                                    <img src="{{ asset('images/frontend/heart.png') }}" style="color:#fff;">

                                </div>

                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif

                </div>
            </div>

        </div>






        <!-- End col-3 col-sm-4 -->


        <!-- End row -->
        <!-- End col-sm-9 -->


        <!-- End rk-body row -->
    </div>
    <!-- End rk-body container -->
</div>
@endsection