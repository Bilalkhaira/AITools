<!--begin::Table widget 14-->
<div class="card card-flush h-md-100">
	<!--begin::Header-->
	<div class="card-header pt-7">
		<!--begin::Title-->
		<h3 class="card-title align-items-start flex-column">
			<span class="card-label fw-bold text-gray-800">Latest AI Tools</span>
			@if(!empty($tools[0]->created_at))
			<span class="text-gray-400 mt-1 fw-semibold fs-6">{{ $tools[0]->created_at->diffForHumans() ?? '' }}</span>
			@endif
		</h3>
		<!--end::Title-->
		<!--begin::Toolbar-->
		<div class="card-toolbar">
			<a href="{{ route('tools.index') }}" class="btn btn-sm btn-light">View All AI Tool</a>
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
						<th class="p-0 pb-3 min-w-175px text-start">Title</th>
						<th class="p-0 pb-3 min-w-100px text-end">Category</th>
						<th class="p-0 pb-3 min-w-100px text-end">Price</th>
						<th class="p-0 pb-3 min-w-175px text-end pe-12">Website Link</th>
						<th class="p-0 pb-3 w-50px text-end">VIEW</th>
					</tr>
				</thead>
				<!--end::Table head-->
				<!--begin::Table body-->
				<tbody>
					@if(!empty($tools))
					@foreach($tools as $tool)
					
					<tr>
						<td>
							<div class="d-flex align-items-center">
								<div class="d-flex justify-content-start flex-column">
									<a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">{{ $tool->title ?? ''}}</a>
								</div>
							</div>
						</td>
						<td class="text-end pe-0">
							<span class="text-gray-600 fw-bold fs-6">{{ $tool->category ?? ''}}</span>
						</td>
						<td class="text-end pe-0">
							<!--begin::Label-->
							<span class="badge badge-light-success fs-base">{{ $tool->price ?? ''}}</span>
							<!--end::Label-->
						</td>
						<td class="text-end pe-12">
							<span class="badge py-3 px-4 fs-7 badge-light-primary">{{ $tool->website_link ?? ''}}</span>
						</td>
						
						<td class="text-end">
							<a href="{{ route('tools.show' ,$tool->id) }}" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">{!! getIcon('black-right', 'fs-2 text-gray-500') !!}</a>
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
