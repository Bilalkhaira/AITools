@extends('frontend.layout.master')
@section('content')
<div class="rk_form_submit">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="rk_form_list">
                    <form method="POST" action="{{ route('update.tool', $tool->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <h3>Submit New Tool</h3>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Ai Tool Title*</label>
                            <input type="text" name="title" class="form-control" value="{{ $tool->title ?? '' }}">
                            @error('title')
                            <div class="colorRed">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Tool Category*</label>
                            <select class="form-select" name="tool_categories_id">
                                <option selected>Choice Categories</option>
                                @if(!empty($categories))
                                @foreach($categories as $category)
                                <option @if($category->id == $tool->tool_categories_id) selected @endif
                                    value="{{ $category->id}}">{{$category->title}}</option>
                                @endforeach
                                @endif
                            </select>
                            <span>Select the Category of This Tool. Ex: SEO or Video Generation</span>
                            @error('tool_categories_id')
                            <div class="colorRed">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Short Description*</label>
                            <textarea class="form-control" name="description"
                                rows="3">{{ $tool->description ?? ''}}</textarea>
                            <span>Between 100 and 200 character</span>
                            @error('description')
                            <div class="colorRed">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Use Case 1*</label>
                            <input type="text" class="form-control" value="{{ $tool->use_case1 ?? '' }}"
                                name="use_case1">
                            <span>Write 3 use-cases of or this tool. Each one should not be longer than 30 words. Don't
                                add numbers, we'll format it.</span>
                            @error('use_case1')
                            <div class="colorRed">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Use Case 2*</label>
                            <input type="text" class="form-control" value="{{ $tool->use_case2 ?? '' }}"
                                name="use_case2">
                            <span>Second Use-Case</span>
                            @error('use_case2')
                            <div class="colorRed">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Use Case 3*</label>
                            <input type="text" class="form-control" value="{{ $tool->use_case3 ?? '' }}"
                                name="use_case3">
                            <span>3rd Use Case</span>
                            @error('use_case3')
                            <div class="colorRed">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Tags</label>
                            <input type="text" name="tags" class="form-control" value="{{ $tool->tags ?? '' }}">
                            <span>Enter tags related to your tools</span>
                        </div>
                        @error('tags')
                        <div class="colorRed">{{ $message }}</div>
                        @enderror

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Price </label>
                        </div>
                        <div class="mb-3" id="rk_radio_box">

                            <div class="form-check form-check-inline">
                                <input @if($tool->price == 'Freemium') checked @endif class="form-check-input
                                optionsPrice" name="price" type="radio" id="inlineCheckbox1" value="Freemium">
                                <label class="form-check-label" for="inlineCheckbox1">Freemium</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input @if($tool->price == 'Free') checked @endif class="form-check-input optionsPrice"
                                name="price" type="radio" id="inlineCheckbox2" value="Free">
                                <label class="form-check-label" for="inlineCheckbox2">Free</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input @if($tool->price == 'Free Trail') checked @endif class="form-check-input
                                optionsPrice" name="price" type="radio" id="inlineCheckbox3" value="Free Trail">
                                <label class="form-check-label" for="inlineCheckbox3">Free Trail</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input @if($tool->price == 'Premium') checked @endif class="form-check-input
                                optionsPrice" name="price" type="radio" id="inlineCheckbox4" value="Premium">
                                <label class="form-check-label" for="inlineCheckbox3">Premium</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input @if($tool->price == 'Contact for Pricing') checked @endif class="form-check-input
                                optionsPrice" name="price" type="radio" id="inlineCheckbox5" value="Contact for
                                Pricing">
                                <label class="form-check-label" for="inlineCheckbox3">Contact for Pricing</label>
                            </div>
                            <p><span>What is the payment model of this tool?</span></p>
                        </div>
                        @error('price')
                        <div class="colorRed">{{ $message }}</div>
                        @enderror

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Website Link</label>
                            <input type="text" name="website_link" class="form-control"
                                value="{{ $tool->website_link ?? '' }}">
                            <span>Where can users access the Tool?</span>
                        </div>
                        @error('website_link')
                        <div class="colorRed">{{ $message }}</div>
                        @enderror

                        <div class="mb-3" id="rkformFileMultiple">
                            <label for="formFileMultiple" class="form-label">Thumbnail-Image</label>
                            <input class="form-control" type="file" id="formFileMultiple" name="images[]"
                                multiple="multiple">
                            <span>Maximum file size: 5MB</span><br>
                            <span>Tool Landing Page Screenshot</span>
                        </div>
                        @error('images')
                        <div class="colorRed">{{ $message }}</div>
                        @enderror
                        <div class="row editToolImage">
                            @if(!empty($tool->images[0]))
                            @foreach($tool->images as $image)
                            <div class="col-md-3">
                                <span id="imgDelete">
                                    <a href="#" id="img_dlt_btn"><i class="fa fa-trash"></i></a>
                                    <input type="hidden" id="imgId" value="{{ $image->id }}">
                                </span>
                                <img width="100%" src="{{ asset('images/frontend/'.$image->images) }}">
                            </div>
                            @endforeach
                            @endif

                        </div>

                        <div class="mb-3" id="rkFromListsubmit">

                            <input class="form-control" type="submit" value="Submit">
                        </div>

                    </form>

                </div>
                <!-- End rk form list -->
            </div>

        </div>

    </div>

</div>
<script>
    $(document).on("click", "#img_dlt_btn", function(e) {
        e.preventDefault();
        var imgId = $(this).closest('div').find("#imgId").val();
        $(this).closest("div").css('display', 'none');
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $.ajax({
            url: "{{ route('delete.tool.image') }}" + "/" + imgId,
            type: "GET",
            dataType: "json",

            success: function(data) {

            }
        });
    });
</script>
@endsection