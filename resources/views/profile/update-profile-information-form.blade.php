<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">
        <div class="d-flex">
            <div style="width: 75%" class="mr-1 rounded">
                <!-- Name -->
                <div class="col-span-6 sm:col-span-4 form-group mt-1">
                    <x-jet-label for="username" value="{{ __('Username') }}" />
                    <x-jet-input id="username" type="text" class="mt-1 block w-full col-lg-8 form-control" wire:model.defer="state.username" autocomplete="username" />
                    <x-jet-input-error for="username" class="mt-2" />
                </div>

                <!-- Email -->
                <div class="col-span-6 sm:col-span-4 from-group mt-1">
                    <x-jet-label for="email" value="{{ __('Email') }}" />
                    <x-jet-input id="email" type="email" class="mt-1 block w-full col-lg-8 form-control" wire:model.defer="state.email" />
                    <x-jet-input-error for="email" class="mt-2" />
                </div>
                <x-jet-button class="btn btn-primary profileBtn col-lg-2 btn-sm mr-1 mt-3 " wire:loading.attr="disabled" wire:target="photo">
                    {{ __('Save') }}
                </x-jet-button>
            </div>
            <div style="width: 25%" class="">
                <!-- Profile Photo -->
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4 rounded mx-auto d-block">
                    <!-- Profile Photo File Input -->
                    <input type="file" class="hidden"
                                wire:model="photo"
                                x-ref="photo"
                                x-on:change="
                                        photoName = $refs.photo.files[0].name;
                                        const reader = new FileReader();
                                        reader.onload = (e) => {
                                            photoPreview = e.target.result;
                                        };
                                        reader.readAsDataURL($refs.photo.files[0]);
                                " />

                    <div class="d-flex">
                        <x-jet-label for="photo" value="{{ __('Photo') }}" class="mt-2"/>
                        @if ($this->user->profile_photo_path)
                            <x-jet-secondary-button type="button" class="profileBtn btn-sm mb-1 mt-1" wire:click="deleteProfilePhoto">
                                {{ __('Remove') }}
                            </x-jet-secondary-button>
                        @endif
                    </div>

                    <!-- Current Profile Photo -->
                    <div class="mt-2" x-show="! photoPreview">
                        <img src="{{ auth()->user()->profile_photo_url }}" alt="{{ $this->user->username }}" style="max-width: 80%;" class="rounded-circle d-block">
                    </div>

                    <!-- New Profile Photo Preview -->
                    <div class="mt-2" x-show="photoPreview" style="display: none;">
                        <span class=" block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                            x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                        </span>
                    </div>

                    <div class="d-flex">
                        <x-jet-secondary-button class="profileBtn btn-sm mt-1" type="button" x-on:click.prevent="$refs.photo.click()">
                            {{ __('New Photo') }}
                        </x-jet-secondary-button>


                        <div class="" style="padding-left: 50px">
                            <x-jet-button class="btn btn-primary btn-glow profileBtn mt-1 " wire:loading.attr="disabled" wire:target="photo">
                                {{ __('Save') }}
                            </x-jet-button>
                        </div>
                    </div>

                    <x-jet-input-error for="photo" class="mt-2" />
                </div>
                @endif
            </div>
        </div>

    </x-slot>
</x-jet-form-section>
