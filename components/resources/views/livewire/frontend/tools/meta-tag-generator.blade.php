<div>

      <form wire:submit.prevent="onMetaTagGenerator">

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
                                    
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <div class="row">

            <div class="col-12">
                <div class="form-group">
                    <label>{{ __('Site Title') }} <small><span>({{ __('Characters left: 60') }})</span></small></label>
                    <input type="text" wire:model="title" class="form-control" placeholder="{{ __('Title must be within 60 Characters') }}">
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label>{{ __('Site Description') }} <small><span>({{ __('Characters left: 150') }})</span></small></label>
                    <textarea class="form-control" wire:model="description" placeholder="{{ __('Description must be within 150 Characters') }}"></textarea>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label>{{ __('Site Keywords') }} <small><span>({{ __('Separate with commas') }})</span></small></label>
                    <textarea class="form-control" wire:model="keywords" placeholder="{{ __('Keywords 1, Keywords 2, Keywords 3') }}"></textarea>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label>{{ __('Allow robots to index your website?') }}</label>
                    <select class="form-control form-select" wire:model="robots_index">
                        <option value="index">{{ __('Yes') }}</option>
                        <option value="noindex">{{ __('No') }}</option>
                    </select>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label>{{ __('Allow robots to follow all links?') }}</label>
                    <select class="form-control form-select" wire:model="robots_links">
                        <option value="follow">{{ __('Yes') }}</option>
                        <option value="nofollow">{{ __('No') }}</option>
                    </select>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label>{{ __('What type of content will your site display?') }}</label>
                    <select class="form-control form-select" wire:model="content_type">
                        <option value="text/html; charset=utf-8">{{ __('UTF-8') }}</option>
                        <option value="text/html; charset=utf-16">{{ __('UTF-16') }}</option>
                        <option value="text/html; charset=iso-8859-1">{{ __('ISO-8859-1') }}</option>
                        <option value="text/html; charset=windows-1252">{{ __('WINDOWS-1252') }}</option>
                    </select>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label>{{ __('What is your site\'s primary language?') }}</label>
                    <select class="form-control form-select" wire:model="language">
                        <option value>{{ __('No Language Tag') }}</option>
                        <option value="English">{{ __('English') }}</option>
                        <option value="French">{{ __('French') }}</option>
                        <option value="Spanish">{{ __('Spanish') }}</option>
                        <option value="Russian">{{ __('Russian') }}</option>
                        <option value="Arabic">{{ __('Arabic') }}</option>
                        <option value="Japanese">{{ __('Japanese') }}</option>
                        <option value="Korean">{{ __('Korean') }}</option>
                        <option value="Hindi">{{ __('Hindi') }}</option>
                        <option value="Portuguese">{{ __('Portuguese') }}</option>
                    </select>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label>{{ __('Search engines should revisit this page after') }}</label>
                    <select class="form-control form-select" wire:model="revisit_days">
                        <option value>{{ __('Select Days') }}</option>
                        <option value="1 day">1 {{ __('day') }}</option>
                        <option value="2 days">2 {{ __('days') }}</option>
                        <option value="3 days">3 {{ __('days') }}</option>
                        <option value="4 days">4 {{ __('days') }}</option>
                        <option value="5 days">5 {{ __('days') }}</option>
                        <option value="6 days">6 {{ __('days') }}</option>
                        <option value="7 days">7 {{ __('days') }}</option>
                        <option value="8 days">8 {{ __('days') }}</option>
                    </select>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label>{{ __('Author') }}</label>
                    <input type="text" class="form-control" wire:model="author">
                </div>
            </div>

            <div class="col mt-3">
                <div class="form-group">
                    <button class="btn bg-gradient-info mx-auto d-block" wire:loading.attr="disabled">
                        <span>
                            <div wire:loading.inline wire:target="onMetaTagGenerator">
                                <x-loading />
                            </div>
                            <span wire:target="onMetaTagGenerator">{{ __('Generate') }}</span>
                        </span>
                    </button>
                </div>
            </div>
        </div>

        @if ( !empty($data) )
          <div class="form-group position-relative mb-3">
              <textarea id="text" class="form-control" rows="10">{{ $data }}</textarea>
              <a value="copy" onclick="copyToClipboard()" class="btn bg-gradient-success btn-icon btn-icon-only cursor-pointer position-absolute top-0 end-0 m-2" title="{{ __('Copy') }}" data-bs-toggle="tooltip" data-bs-original-title="{{ __('Copy') }}">
                  <i class="fas fa-copy"></i>
              </a>
          </div>
        @endif

      </form>
</div>