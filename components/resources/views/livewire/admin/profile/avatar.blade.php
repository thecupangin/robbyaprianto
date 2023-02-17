<div class="d-flex" wire:ignore.self>
	<div class="col-auto">
		<form wire:submit.prevent="onUpdateAvatar">
			<div class="avatar avatar-xl position-relative">
				<img src="{{ $profile->avatar }}" alt="{{ __('Avatar') }}" class="w-100 border-radius-lg shadow-sm">

				<a href="javascript:;" class="btn btn-sm btn-icon-only bg-gradient-light position-absolute bottom-0 end-0 mb-n2 me-n2 edit-avatar" data-input="avatar">
					<i class="fa fa-pen top-0" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('Edit Image') }}"></i>
				</a>

			</div>
			<input id="avatar" wire:model="avatar" class="form-control" type="hidden">
		</form>
	</div>

	<div class="col-auto my-auto ps-4">
		<div class="h-100">
			<h5 class="mb-1">{{ $profile->fullname }}</h5>
			<p class="mb-0 font-weight-bold text-sm">
				{{ $profile->position }}
			</p>
		</div>
	</div>



	<div class="my-sm-auto ms-sm-auto me-sm-0 mx-auto my-2" wire:ignore>
		<div class="nav-wrapper position-relative end-0 ms-2">

			<ul class="nav nav-pills nav-fill p-1" role="tablist">

				<li class="nav-item">
					<a class="nav-link active" href="javascript:;" id="overview-tab" data-bs-toggle="tab" data-bs-target="#overview">
						<span>{{ __('Overview') }}</span>
					</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="javascript:;" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile">
						<span>{{ __('Update Profile') }}</span>
					</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="javascript:;" id="password-tab" data-bs-toggle="tab" data-bs-target="#password">
						<span>{{ __('Change Password') }}</span>
					</a>
				</li>

			</ul>
		</div>
	</div>
	
</div>