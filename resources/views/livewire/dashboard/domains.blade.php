<div>
    @foreach ($domains as $domain)
        <div class="flex justify-between items-center m-2 px-5 py-4 rounded-md bg-gray-700">
            <div class="w-1/5">
                <p class="text-gray-300"> {{ $domain->host }} </p>
            </div>

            <div class="w-1/3 flex justify-between items-center">    
                @if ($domain->pings()->exists())
                    @if ($domain
                    ->pings()
                    ->latest()
                    ->first()->status === 200)
                        <p class="rounded-lg px-2 py-1 bg-green-300 text-green-700">Up</p>
                    @else
                        <p class="rounded-lg px-2 py-1  bg-red-300 text-red-600">Down</p>
                    @endif


                    @if ($domain->uptime() > 95)
                        <p class="rounded-lg px-2 py-1 bg-green-300 text-green-700">{{ $domain->uptime() }}%</p>
                    @else
                        <p class="rounded-lg px-2 py-1 bg-red-300 text-red-700">{{ $domain->uptime() }}%</p>
                    @endif

                    <p class="text-gray-300"> {{ $domain->pings()->latest()->first()->latency }}s </p>
                @else
                    <p class="rounded-lg px-2 py-1 bg-blue-300 text-blue-600 text-sm">...</p>
                    <p class="rounded-lg px-2 py-1 bg-blue-300 text-blue-600 text-sm">...</p>
                    <p class="text-gray-300 text-sm">...</p>
                @endif
            </div>

            <div class="w-1/5 flex justify-between items-center">   
                <x-jet-danger-button wire:click="openDeleteModal({{ $domain->id }})">
                    x
                </x-jet-danger-button>
            </div>
        </div>
    @endforeach


    <x-jet-confirmation-modal wire:model="deletingDomain">
        <x-slot name="title">
            Delete Domain
        </x-slot>
    
        <x-slot name="content">
            Are you sure you want to delete the domain? Once your domain is deleted, all of its resources and data will be permanently deleted.
        </x-slot>
    
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('deletingDomain')" wire:loading.attr="disabled">
                Nevermind
            </x-jet-secondary-button>
    
            <x-jet-danger-button class="ml-2" wire:click="deleteDomain()" wire:loading.attr="disabled">
                Delete Domain
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>
</div>
