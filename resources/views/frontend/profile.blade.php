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
				  	<form>
				  	 <h3>Profile</h3>

				  	 	<div class="mb-3" id="rkformFileMultipl">
						  <label for="formFileMultiple" class="form-label">Upload Profile</label>
						  <input class="form-control" type="file" id="formFileMultiple" multiple>
						  <span>Maximum file size: 1MB</span>
						 
						</div>

				          <div class="mb-3">
						  <label for="exampleFormControlInput1" class="form-label">Name</label>
						  <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Your Name">
						</div>					

						 <div class="mb-3">
						  <label for="exampleFormControlInput1" class="form-label">Email</label>
						  <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Enter Your Email">
						  
						</div>

						 <div class="mb-3" id="rkProfileBio">
						  <label for="exampleFormControlTextarea1" class="form-label">Bio</label>
						  <textarea  rows="10" class="form-control" placeholder="About Your Self" id="exampleFormControlTextarea1" rows="3"></textarea>
						  
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