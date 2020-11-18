<div>
    @foreach ($domains as $domain)
        <div class="flex justify-between items-center m-2 px-5 py-4 rounded-md bg-gray-800">
            <p class="text-gray-300"> {{ $domain->host }} </p>

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
                <p class="rounded-lg px-2 py-1 bg-blue-300 text-blue-600">Collecting data...</p>
                <p class="rounded-lg px-2 py-1 bg-blue-300 text-blue-600">Collecting data...</p>
                <p class="text-gray-300">Collecting data...</p>
            @endif
        </div>
    @endforeach
</div>
