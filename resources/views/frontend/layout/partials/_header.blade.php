<div class="rk_header">
    <div class="container rk-container">
        <div class="row rk-header-row">
            <div class="col">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('images/frontend/logo.png') }}">
                </a>
                <span>AI Tools Listing Platform</span>
            </div>
            <div class="col">

            </div>
            <div class="col">
                <div class="rk_submit_tool">

                    <a href="{{ route('addNewTool') }}" type="button" class="btn"><i class="fa-solid fa-key"
                            style="color: #fff;"></i>&nbsp; Submit Tool</a>
                </div>


				@if(auth()->user())
				<div class="rk_dropdown">
			       	       	<div class="btn-group">
						  <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
						  	<i class="fa-solid fa-circle-user fa-sm"></i>
						  	<i class="fa-solid fa-bars"></i>
						    
						  </button>
						  <ul class="dropdown-menu dropdown-menu-lg-end">
						    <li><a href="{{ route('admin-panel.index') }}" class="dropdown-item" type="button"><i class="fa-solid fa-user" style="color: #47769E"></i> <b>Admin Dashboard</b></a></li>
						    <!-- <li><a class="dropdown-item" href="{{ route('addNewTool') }}" type="button"><i class="fa-solid fa-user" style="color: #47769E"></i> <b>Submit Tool</b></a></li> -->
						    <li><a class="dropdown-item" href="{{ route('addNewTool') }}" type="button">
						    	<i class="fa-solid fa-turn-up" style="color: #47769E"></i>
						    <b>Publish New Tool</b></a></li>
                                <li><a href="{{ route('my-profile') }}" class="dropdown-item" type="button">
                                    <i class="fa-solid fa-code-compare" style="color: #47769E"></i>
                                <b>My Profile</b></a></li>
						    <!-- <li><a class="dropdown-item" type="button">
						    	<i class="fa-solid fa-bookmark" style="color: #47769E"></i>
						    <b>Featured Tool</b></a></li> -->
						    <!-- <li><a class="dropdown-item" type="button">
						    	<i class="fa-solid fa-gear" style="color: #47769E"></i>
						    <b>Setting</b></a></li> -->
						    <li><a href="{{ route('signout') }}" class="dropdown-item" type="button">
						    	<i class="fa-solid fa-lock" style="color: #47769E"></i>
						    <b>Logout</b></a></li>
						   
						  </ul>
						</div>

			
			       </div>
				@else
                <div class="rk_dropdown">
                    <div class="btn-group">
                        <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown"
                            data-bs-display="static" aria-expanded="false">
                            <i class="fa-solid fa-circle-user fa-sm"></i>
                            <i class="fa-solid fa-bars"></i>

                        </button>
                        <ul class="dropdown-menu dropdown-menu-lg-end">
                            <li><a href="{{ route('signup') }}" class="dropdown-item"><i class="fa-solid fa-user"
                                        style="color: #47769E"></i> <b class="colorWhite">Register</b></a></li>
                            <li><a href="{{ route('signin') }}" class="dropdown-item" type="button">
                                    <i class="fa-solid fa-lock" style="color: #47769E"></i>
                                    <b class="colorWhite">Login</b></a></li>

                        </ul>
                    </div>


                </div>
				@endif
                <!-- End rk_dropdown -->

            </div>
        </div>
        <!-- End header row -->
    </div>
    <!-- End header container -->
</div>