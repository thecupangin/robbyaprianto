<div>

        <button class="btn bg-gradient-primary mb-3" data-bs-toggle="modal" data-bs-target="#addNewUser"><i class="fas fa-plus fa-fw me-1"></i> {{ __('Add New User') }}</button>

        <!-- begin:Form Search -->
        <form id="formSearchPage">
            <div class="input-group mb-3">
                <input type="text" class="form-control" wire:model="searchQuery" placeholder="{{ __('Search with title...') }}">
            </div>
        </form>
        <!-- end:Form Search -->

        <div class="card">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{{ __('Full name') }}</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{{ __('Email') }}</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{{ __('Join Date') }}</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{{ __('Latest updates') }}</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if ( $users->isNotEmpty() )

                            @foreach ($users as $user)

                                <tr>
                                    <td class="align-middle">
                                        <div class="d-flex px-2">
                                            <div class="my-auto">
                                                {{ $user->fullname }}
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle">{{ $user->email }}</td>
                                    <td class="align-middle">{{ $user->created_at }}</td>
                                    <td class="align-middle">{{ $user->updated_at }}</td>
                                    <td class="w-25">
                                        <a wire:click="onShowEditUserModal( {{ $user->id }} )" class="btn bg-gradient-info" title="{{ __('Edit') }}"><i class="fas fa-edit icon"></i> {{ __('Edit') }}</a>
                                        <a wire:click="onDeleteConfirmUser( {{ $user->id }} )" class="btn bg-gradient-danger" title="{{ __('Delete') }}"><i class="fas fa-trash icon"></i> {{ __('Delete') }}</a>
                                    </td>
                                </tr>

                            @endforeach

                        @else

                            <tr>
                                <td class="align-middle">{{ __('No record found') }}</td>
                            </tr>

                        @endif

                    </tbody>
                </table>
            </div>

            <div class="mx-auto my-3">
                {{ $users->links() }}
            </div>
        </div>

        <!-- Begin::Add New User -->
        <div class="modal fade" id="addNewUser" tabindex="-1" role="dialog" aria-labelledby="addNewUserLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="addNewUserModalLabel">{{ __('Add New User') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              @livewire('admin.users.create')

            </div>
          </div>
        </div>
        <!-- End::Add New User -->

        <!-- Begin::Edit User -->
        <div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="editUsersLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="editUsersModalLabel">{{ __('Edit User') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              @livewire('admin.users.edit')
              
            </div>
          </div>
        </div>
        <!-- End::Edit User -->

</div>

<script>
(function( $ ) {
    "use strict";

    document.addEventListener('livewire:load', function () {

        window.addEventListener('swal:modal', event => {

            const swalWithBootstrapButtons = Swal.mixin({
              customClass: {
                confirmButton: 'btn bg-gradient-success',
                cancelButton: 'btn bg-gradient-danger'
              },
              buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
              title: event.detail.title,
              text: event.detail.text,
              icon: event.detail.type,
              showCancelButton: true,
              confirmButtonText: "{{ __('Yes, delete it!') }}",
              cancelButtonText: "{{ __('Cancel') }}"
            }).then((result) => {
              if (result.isConfirmed) {
                window.livewire.emit('onDeleteUser', event.detail.id)
              }
            });
    
        });

        window.addEventListener('closeModal', event => {
            jQuery('#' + event.detail.id).modal('hide');
        });

        window.addEventListener('showModal', event => {
            jQuery('#' + event.detail.id).modal('show');
        });
            
        window.addEventListener('alert', event => {
            toastr[event.detail.type](event.detail.message);
        });

    });

})( jQuery );
</script>