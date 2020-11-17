<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-900 overflow-hidden shadow-xl sm:rounded-lg p-4">
                <div class="flex justify-end mb-2 px-2 py-4 ">
                    <x-jet-button>
                        {{ __('domain.add_domain_button') }}
                    </x-jet-button>
                </div>

                @foreach ($domains as $domain)
                    <div class="flex justify-between items-center m-2 px-5 py-4 rounded-md bg-gray-800">
                        <p class="text-gray-400"> {{ $domain->host }} </p>

                        @if ($domain->pings()->latest()->first()->status === 200)
                            <p class="rounded-lg px-2 py-1 bg-green-300 text-green-600">Up</p>
                        @else
                            <p class="px-3 py-2 bg-red-300 text-red-600">Down</p>
                        @endif

                        @if ($domain->uptime() > 95)
                            <p class="rounded-lg px-2 py-1 bg-green-300 text-green-600">{{ $domain->uptime() }}%</p>
                        @else
                            <p class="px-3 py-2 bg-red-300 text-red-600">{{ $domain->uptime() }}%</p>
                        @endif

                        <p class="text-gray-400"> {{ $domain->pings()->latest()->first()->latency }}s </p>

                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
