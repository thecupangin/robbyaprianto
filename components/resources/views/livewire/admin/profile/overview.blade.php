<div class="card h-100 tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab" wire:ignore.self>
	<div class="card-header bg-gradient-secondary">
		<span class="card-title text-white text-bold">{{ __('Overview') }}</span>
	</div>
	<div class="card-body">

		<p>{{ $profile->bio }}</p>
		<ul class="list-group">
			<li class="list-group-item"><strong>{{ __('Full Name') }}:</strong> {{ $profile->fullname }}</li>
			<li class="list-group-item"><strong>{{ __('Position') }}:</strong> {{ $profile->position }}</li>
			<li class="list-group-item"><strong>{{ __('Mobile') }}:</strong> {{ $profile->phone }}</li>
			<li class="list-group-item"><strong>{{ __('Email') }}:</strong> {{ $profile->email }}</li>
			<li class="list-group-item"><strong>{{ __('Address') }}:</strong> {{ $profile->address }}</li>

			@if ( $profile->social_status == true)
				@if ( $socials != null )

					<li class="list-group-item">
						<strong>Social:</strong> &nbsp;
						@foreach ($socials as $social)
							<a class="btn btn-{{ $social['name'] }} btn-icon-only rounded-circle btn-sm mb-0" href="javascript:;">
								<i class="fab fa-{{ $social['name'] }}" aria-hidden="true"></i>
							</a>
						@endforeach
					</li>

				@endif
			@endif

		</ul>

	</div>
</div>
