@extends('frontend.layout.master')
@push('css')
<style type="text/css">
.rk_dropdown_notification{
			float: right;
		}
		.rk_submit_tool button {
		    background: #384148;
		    text-align: center;
		    color: #fff;
		    font-weight: bold;
		    border-radius: 22px;
		}
		.rk-noti-lg{
			    background: #384148;
			    height: 116px;


		}
		.rk_noti h5{
			/*float: left;*/
			color: #fff;
            font-size: 13px;
		}
		.rk_noti span{
			    float: right;
			    margin-top: -5%;
			    font-size: 9px;
		}
		.rk_noti{

			 width: 405px;
		    border-radius: 5px;
		    background-color: #3E566A;
		    padding: 16px;
		    padding-top: 0px;
		    margin-top: -2%;
		    height: 77px;
		}
		.rk_noti p{

		    width: 69%;
		    font-size: 11px;
		    text-align: justify;
		    margin-left: 0%;
		}
		.rk_noti button{
			float: right;
		    margin-top: -10%;
		    background: #56ABF4;
		    font-size: 9px;
		    width: 15%;
		}
		.rk_header{
			border-bottom: 1px solid #888E93;
		}
		.rk_header_banner{
			border:none;
		}
</style>
@endpush
@section('content')
<div class="rk_header_banner">
	<div class="container rk-container">
		<div class="row rk_welcome_img">
			 <div class="col-12">
			 	<img src="{{ asset('images/frontend/profile_img.png') }}">
			 	 <h3>Welcome, <b style="color: #56ABF4;">Jon</b></h3>
			 </div>
		</div>
		<div class="row rk_profile_button">
				 <div class="col-3"><button class="btn" type="button" style="float: right;background-color: #56ABF4;"><i class="fa-solid fa-laptop-code"></i>Dashboard</button></div>
				 <div class="col-3"><button class="btn" type="button"><i class="fa-solid fa-turn-up"></i>Publish New Tool</button></div>
				 <div class="col-3"><button class="btn" type="button"><i class="fa-solid fa-code-compare"></i>Favorite Tool</button></div>
				 <div class="col-3"><button class="btn" type="button"><i class="fa-solid fa-bookmark"></i>Featured Tool</button></div>
			 <!-- End rk_profile_button -->
		    <!-- End col-12 -->
		 </div>

		 <div class="row rk_welcome_toll">
			 <div class="col-12">
			 	 <h3>Tool Submited</h3>
			 	 <button class="btn">More Tools</button>
			 </div>
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
		     
		    </div>
		    <!-- End col-sm-3 -->
			    <div class="col-sm-9">
			      <div class="row rk_col_3">
			        <div class="col-3 col-sm-4">
			        	<div class="rk_head_post_img">
			               <img src="{{ asset('images/frontend/profile_content.png') }}">
			             <div class="rk_post_title">
			             	  <h4>Junia</h4>
			             	   <button class=""> Free</button>
			             </div>
			             <div class="rk_post">
			             	<p>
			             	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.
			             	</p>
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
			             <!-- End rk_post_bottom -->
			        </div>
			        <!-- End rk_head_post_img -->
			      </div>
			      <!-- End col-3 col-sm-4 -->

			             

			           
			              <div class="col-3 col-sm-4">
			        	<div class="rk_head_post_img">
			               <img src="{{ asset('images/frontend/post_image.png') }}">
			             <div class="rk_post_title">
			             	  <h4>Junia</h4>
			             	   <button class=""> Free</button>
			             </div>
			             <div class="rk_post">
			             	<p>
			             	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.
			             	</p>
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
			             <!-- End rk_post_bottom -->
			        </div>
			        <!-- End rk_head_post_img -->
			      </div>
			      <!-- End col-3 col-sm-4 -->

			     
			    </div>
			    <!-- End row -->
				</div>
			      <!-- End col-sm-9 -->

		  
	   </div>
	   <!-- End rk-body row -->
    </div>
	<!-- End rk-body container -->
</div>
@endsection