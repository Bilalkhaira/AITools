@extends('frontend.layout.master')
@section('content')
<div class="rk_header_banner">
    <div class="container rk-container">
        <div class="row">
            <div class="col-12">
                <div class="rk-header-row">
                    <h2>Find The Perfect AI Tool For <b style="color: #56ABF4;">Every Task</b></h2>
                    <p>A Platform Where People Can List There AI Tools And Community Can Find Any AI Tool Here.Backend
                        Like A List Platform Basic Crud Application With Fields To Add A AI Tool Listing.</p>
                </div>
                <div class="rk_banner_category">
                    <div class="input-group">
                        <div class="form-outline">
                            <input placeholder="Search By Name, Use-Case Or Description" id="search-focus" type="search"
                                class="form-control searchInput" />

                        </div>
                        <button type="button" id="searchBtn" class="btn rk-btn btn-primary" data-mdb-ripple-init>
                            <i class="fas fa-search"></i>
                        </button>
                    </div>

                </div>
                <!-- End rk banner category -->
                <div class="rk_cat_slider">
                    @if(!empty($categories))
                    @foreach($categories as $category)
                    <a href="#" id="tagFilter" data-my-variable="{{ $category->id }}">{{ $category->title }}</a>
                    <!-- <button type="button" class="btn">{{ $category->title }}</button> -->
                    @endforeach
                    @endif
                    <!-- <a href="{{ route('home', ['limit' => 100, 'offset' => 1]) }}">{{ $category->title }}</a> -->
                </div>
            </div>
            <!-- End col-12 -->
        </div>
        <!-- End header banner row -->
    </div>
    <!-- End header banner container -->
</div>
<!-- End header banner section  -->



<div class="rk_body_content">
    <div class="container rk-body-container">
        <div class="row rk-body-row">
            <div class="col-sm-3">
                <div class="rk_filter_category">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Categories</label>
                        <select class="form-select" id="price_filter" aria-label="Default select example">
                            <option selected>Choice Categories</option>
                            @if(!empty($categories))
                            @foreach($categories as $category)
                            <option value="{{ $category->id}}">{{$category->title}}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>

                    <!-- <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Sort</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Select Sort</option>
                            <option value="default">Default</option>
                            <option value="by_date">By Date</option>
                            <option value="by_name">By Name (A-Z)</option>
                        </select>
                    </div> -->

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Pricing</label>
                        <select class="form-select" id="price_filter" aria-label="Default select example">
                            <option selected>Select Price</option>
                            <option value="Freemium">Freemium</option>
                            <option value="Free">Free</option>
                            <option value="Free Trail">Free Trail</option>
                            <option value="Premium">Premium</option>
                            <option value="Contact for Pricing">Contact for Pricing</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <!-- <button type="button" class="btn">Favorite Tools</button> -->
                        <!-- <button type="button" class="btn">Favorite Tools</button> -->
                    </div>

                </div>
                <!-- End rk_filter_category -->
            </div>
            <!-- End col-sm-3 -->
            <div class="col-sm-9">
                <div class="row rk_col_3" id="appendTools">
                    @if(!empty($tools))
                    @foreach($tools as $tool)
                    <div class="col-3 col-sm-4">
                        <div class="rk_head_post_img">
                            @if(!empty($tool->images[0]))
                            <img src="{{ asset('images/frontend/'.$tool->images[0]->images ?? '') }}">
                            @endif
                            <div class="rk_post_title">
                                <h4>{{ $tool->title ?? ''}}</h4>
                                <button class=""> {{ $tool->price ?? ''}}</button>
                            </div>
                            <div class="rk_post">
                                <p>{{ Illuminate\Support\Str::limit($tool->description, 50)}}</p>
                            </div>
                            <div class="rk_post_bottom">
                                <button class="">#SEO</button>
                                <button class="">#Keywords</button>

                                <div class="rk_bottom">
                                    <!-- <i class="fa-solid fa-code" style="color:#fff;"></i> -->
                                    <a href="{{ route('tool.show', $tool->id)}}"><i style="color:#fff;" class="fa fa-eye"></i></a>

                                </div>
                                <div class="rk_bottom rk_heart_img_icon">
                                    <input type="hidden" value="{{$tool->id}}">
                                    <img src="{{ asset('images/frontend/heart.png') }}" style="color:#fff;">
                                </div>

                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                    {{--
					<div class="textRight">
						{!! $tools->links() !!}
					</div>
                    --}}
                    <!-- </div> -->
                </div>
                <div class="row rk_col_3">
                    <div class="col-3 col-sm-4"></div>
                    <div class="col-3 col-sm-4"><button class="btn rk_explore">Explore All Tools</button></div>
                    <div class="col-3 col-sm-4"></div>
                    <!-- </div> -->
                </div>
                <!-- End row -->
            </div>
            <!-- End col-sm-9 -->


        </div>
        <!-- End rk-body row -->
    </div>
    <!-- End rk-body container -->
</div>
<!-- End body_content section  -->


<div class="rk_subscriber_content">
    <div class="container">
        <div class="row">
            <div class="rk-subscriber-container">
                <h3>Join 30,000+ Subscribers And Get Our 3 Min Daily Newsletter <b style="color: #56ABF4;">On Al.</b>
                </h3>

                <div class="rk_banner_category_bottom">

                    <div class="input-group">
                        <div class="form-outline">
                            <input placeholder="Enter Your E-mail" id="search-focus" type="search" id="form1"
                                class="form-control" />

                        </div>
                        <button type="button" class="btn rk-btn btn-primary" data-mdb-ripple-init>
                            <b class="f_rk">Subscribe</b>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End rk-subscriber row -->
    </div>
    <!-- End rk-subscriber container -->
</div>
<script>
$(document).on('click', '.rk_heart_img_icon', function(e) {
    var toolId = $(this).find('input').val();
    if (!@json(auth()->user())) {
        toastr.success('First login then you can add tools in your favorite tools list');
        setTimeout(() => {
            window.location.href = 'signin';
        }, 3000);

    } else {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $.ajax({
            url: "{{ route('favorteTool') }}",
            type: "POST",
            dataType: "json",
            data: {
                toolId: toolId
            },
            success: function(response) {
                if (response == 'true') {
                    toastr.success('Updated Successfully');
                } else {
                    toastr.error('This tool is already added in your favorte tools list');
                }
            }
        });
    }

});

$(document).on('change', '#price_filter', function(e) {
    var filter = $(this).val();
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $.ajax({
        url: "{{ route('filterTools') }}",
        type: "POST",
        dataType: "json",
        data: {
            filter: filter
        },
        success: function(response) {
            $('#appendTools').html('');
            response.forEach(item => {
                data = '<div class="col-3 col-sm-4"><div class="rk_head_post_img">';
                data += '<img src="' + item.imgUrl + '">';
                data += '<div class="rk_post_title"> <h4>' + item.title +
                    '</h4><button class="">' + item.price + '</button></div>';
                data += '<div class="rk_post"><p>' + item.description +
                    '</p></div><div class="rk_post_bottom"><button class="">#SEO</button>';
                data +=
                    '<button class="">#Keywords</button><div class="rk_bottom"><i class="fa-solid fa-code" style="color:#fff;"></i></div>';
                data += '<div class="rk_bottom rk_heart_img_icon">';
                data +=
                    '<img src="{{ asset("images/frontend/heart.png") }}" style="color:#fff;">';
                data += '</div></div></div></div>';

                $('#appendTools').append(data);
            });

        }
    });

});

$(document).on('click', '#searchBtn', function(e) {
    var filter = $('.searchInput').val();
    if (filter) {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $.ajax({
            url: "{{ route('filterByInput') }}",
            type: "POST",
            dataType: "json",
            data: {
                filter: filter
            },
            success: function(response) {
                $('#appendTools').html('');
                response.forEach(item => {
                    data = '<div class="col-3 col-sm-4"><div class="rk_head_post_img">';
                    data += '<img src="' + item.imgUrl + '">';
                    data += '<div class="rk_post_title"> <h4>' + item.title +
                        '</h4><button class="">' + item.price + '</button></div>';
                    data += '<div class="rk_post"><p>' + item.description +
                        '</p></div><div class="rk_post_bottom"><button class="">#SEO</button>';
                    data +=
                        '<button class="">#Keywords</button><div class="rk_bottom"><i class="fa-solid fa-code" style="color:#fff;"></i></div>';
                    data += '<div class="rk_bottom rk_heart_img_icon">';
                    data +=
                        '<img src="{{ asset("images/frontend/heart.png") }}" style="color:#fff;">';
                    data += '</div></div></div></div>';

                    $('#appendTools').append(data);
                });

            }
        });
    }
});

$(document).on('click', '#tagFilter', function(e) {
    e.preventDefault();
    $('.active').removeClass('active');
    $(this).addClass('active');
    var filter = $(this).data('my-variable');
    if (filter) {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $.ajax({
            url: "{{ route('filterTools') }}",
            type: "POST",
            dataType: "json",
            data: {
                filter: filter
            },
            success: function(response) {
                $('#appendTools').html('');
                response.forEach(item => {
                    data = '<div class="col-3 col-sm-4"><div class="rk_head_post_img">';
                    data += '<img src="' + item.imgUrl + '">';
                    data += '<div class="rk_post_title"> <h4>' + item.title +
                        '</h4><button class="">' + item.price + '</button></div>';
                    data += '<div class="rk_post"><p>' + item.description +
                        '</p></div><div class="rk_post_bottom"><button class="">#SEO</button>';
                    data +=
                        '<button class="">#Keywords</button><div class="rk_bottom"><i class="fa-solid fa-code" style="color:#fff;"></i></div>';
                    data += '<div class="rk_bottom rk_heart_img_icon">';
                    data +=
                        '<img src="{{ asset("images/frontend/heart.png") }}" style="color:#fff;">';
                    data += '</div></div></div></div>';

                    $('#appendTools').append(data);
                });

            }
        });
    }
});
</script>
@endsection