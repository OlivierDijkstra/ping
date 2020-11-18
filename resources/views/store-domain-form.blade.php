<x-jet-form-section submit="storeDomain">
    <x-slot name="title">
        {{ __('Add domain') }}
    </x-slot>

    <x-slot name="description">
        {{ __('To add a domain, simply specify a host down below and let the app handle the rest 😄') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="host" value="{{ __('Host') }}" />
            <x-jet-input id="host" class="mt-1 block w-full" wire:model.defer="state.host" />
            <x-jet-input-error for="host" class="mt-2" />
        </div>
    </x-slot>
</x-jet-form-section>
