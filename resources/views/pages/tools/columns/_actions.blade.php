<a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
    Actions
    <i class="ki-duotone ki-down fs-5 ms-1"></i>
</a>
<!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="{{ route('tools.show' ,$user->id) }}" class="menu-link px-3">
            View
        </a>
    </div>
    @if($user->status == 'Deactivate')
    <div class="menu-item px-3">
        <a href="{{ route('tools.edit' ,$user->id) }}" class="menu-link px-3">
        Activate
        </a>
    </div>
    @else
    <div class="menu-item px-3">
        <a href="{{ route('tools.edit' ,$user->id) }}" class="menu-link px-3">
        Deactivate
        </a>
    </div>
    @endif
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3 displayNone">
        <a href="#" class="menu-link px-3" onclick="EditBlog(this)" data-bs-toggle="modal" data-bs-target="#EditModal">
            Edit
        </a>
        <input type="hidden" value="{{ $user->id ?? ''}}"  id="blogUpdatedId" >
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3 displayNone">
        <form class="user_delete" action="{{ route('blogs.destroy', $user->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="menu-link px-3 dlt_btn" onclick="return confirm('Are you sure?')">Delete</button>
        </form>
        
    </div>
    <!--end::Menu item-->
</div>
<!--end::Menu-->


