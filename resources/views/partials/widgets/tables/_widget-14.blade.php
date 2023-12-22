<!--begin::Table widget 14-->
<div class="card card-flush h-md-100">
	<!--begin::Header-->
	<div class="card-header pt-7">
		<!--begin::Title-->
		<h3 class="card-title align-items-start flex-column">
			<span class="card-label fw-bold text-gray-800">Latest Users</span>
			@if(!empty($cars[0]))
			<span class="text-gray-400 mt-1 fw-semibold fs-6">{{ $users[0]->created_at->diffForHumans() ?? '' }}</span>
			@endif
		</h3>
		<!--end::Title-->
		<!--begin::Toolbar-->
		<div class="card-toolbar">
			<a href="{{ route('user-management.users.index') }}" class="btn btn-sm btn-light">View all Users</a>
		</div>
		<!--end::Toolbar-->
	</div>
	<!--end::Header-->
	<!--begin::Body-->
	<div class="card-body pt-6">
		<!--begin::Table container-->
		<div class="table-responsive">
			<!--begin::Table-->
			<table class="table table-row-dashed align-middle gs-0 gy-3 my-0">
				<!--begin::Table head-->
				<thead>
					<tr class="fs-7 fw-bold text-gray-400 border-bottom-0">
						<th class="p-0 pb-3 text-start">Name</th>
						<th class="p-0 pb-3">Email</th>
						<th class="p-0 pb-3 ">Created At</th>
						<th class="p-0 pb-3 w-50px text-end">VIEW</th>
					</tr>
				</thead>
				<!--end::Table head-->
				<!--begin::Table body-->
				<tbody>
				@if(!empty($users))
					@foreach($users as $user)
					<tr>
						
						<td class="pe-0">
							<span class="text-gray-600 fw-bold fs-6"> {{ $user->name ?? ''}}</span>
						</td>
						<td class="pe-0">
							<!--begin::Label-->
							<span class="badge badge-light-success fs-base">{{ $user->email ?? ''}}</span>
							<!--end::Label-->
						</td>
						<td class="pe-12">
							<span class="badge py-3 px-4 fs-7 badge-light-primary">{{ $user->created_at->format('d M Y, h:i a') ?? ''}}</span>
						</td>
						
						<td class="text-end">
							<a href="{{ route('user-management.users.show', $user) }}" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">{!! getIcon('black-right', 'fs-2 text-gray-500') !!}</a>
						</td>
					</tr>
					@endforeach
					@endif
				</tbody>
				<!--end::Table body-->
			</table>
		</div>
		<!--end::Table-->
	</div>
	<!--end: Card Body-->
</div>
<!--end::Table widget 14-->
