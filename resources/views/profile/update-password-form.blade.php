<x-jet-form-section submit="updatePassword">
    <div class="mt-3 pt-3">
        <x-slot name="title">
            {{ __('Update Password') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </x-slot>

    </div>
    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4 form-group">
            <x-jet-label for="current_password" value="{{ __('Current Password') }}" />
            <x-jet-input id="current_password" type="password" class="mt-1 block w-full form-control" wire:model.defer="state.current_password" autocomplete="current-password" />
            <x-jet-input-error for="current_password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4 form-group">
            <x-jet-label for="password" value="{{ __('New Password') }}" />
            <x-jet-input id="password" type="password" class="mt-1 block w-full form-control" wire:model.defer="state.password" autocomplete="new-password" />
            <x-jet-input-error for="password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4 form-group">
            <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
            <x-jet-input id="password_confirmation" type="password" class="mt-1 block w-full form-control" wire:model.defer="state.password_confirmation" autocomplete="new-password" />
            <x-jet-input-error for="password_confirmation" class="mt-2" />
        </div>
        <x-jet-button class="btn btn-primary btn-min-width mr-1 mb-1 mt-3 profileBtn">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>

    {{-- <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button>
            {{ __('Save') }}
        </x-jet-button>
    </x-slot> --}}
</x-jet-form-section>
