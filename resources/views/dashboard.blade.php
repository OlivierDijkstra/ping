<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-900 overflow-hidden shadow-xl sm:rounded-lg p-4">
                @livewire('dashboard.domain-modal')

                @livewire('dashboard.domains')
            </div>
        </div>
    </div>
</x-app-layout>
