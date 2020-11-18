<div class="flex justify-end mb-2 px-2 py-4">
    <x-jet-button wire:click="$toggle('storingDomain')">
        {{ __('domain.add_domain_button') }}
    </x-jet-button>

    <x-jet-dialog-modal wire:model="storingDomain">
        <x-slot name="title">
            Add domain
        </x-slot>

        <x-slot name="content">
            <p class="mt-1 mb-4 text-sm text-gray-400">
                {{ __('To add a domain, simply specify a host (domain or IP) down below and let the app handle the rest 😄') }}
            </p>

            <form wire:submit.prevent="submit">
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="host" value="{{ __('Host') }}" />
                    <x-jet-input id="host" wire:model="host" class="mt-1 block w-full" />
                    <x-jet-input-error for="host" class="mt-2" />
                </div>
            </form>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('storingDomain')" wire:loading.attr="disabled">
                Nevermind
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" wire:click="storeDomain" wire:loading.attr="disabled">
                Save
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
