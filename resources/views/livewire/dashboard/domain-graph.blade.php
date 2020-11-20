<div>
    <div id="latency" style="height: 500px;" class="mt-5"></div>

    @push('scripts')
        <script>
            const hooks = new ChartisanHooks();

            hooks.custom(({
                data,
                merge,
                server
            }) => {
                data.type = 'line';

                data.data.datasets[0].data = data.data.datasets[0].data.map((value, index) => {
                    return {
                        t: moment(data.data.labels[index]).utc(),
                        y: value
                    }
                })

                data.data.datasets[0] = {
                    ...data.data.datasets[0],
                    type: 'line',
                    fill: false,
                    borderColor: '#0121FB',
                    pointRadius: 0,
                    pointHoverRadius: 0,
                    pointHitRadius: 1000,
                }

                data.options = {
                    legend: {
                        display: false,
                    },
                    tooltips: {
                        enabled: true,
                        backgroundColor: '#161616',
                        xPadding: 10,
                        yPadding: 10,
                        displayColors: false,
                        callbacks: {
                            label: (item) => {
                                item.value = `Latency: ${item.value}s`

                                return item.value
                            },
                            labelTextColor: () => {
                                return '#ACACAC'
                            }
                        }
                    },
                    scales: {
                        yAxes: [{
                            gridLines: {
                                display: false
                            }
                        }],
                        xAxes: [{
                            type: 'time',
                            time: {
                                unit: 'minute',
                                unitStepSize: 10,
                            },
                            gridLines: {
                                color: 'rgba(22, 22, 22, 1)',
                            },
                        }]
                    }

                }

                return data
            })

            const chart = new Chartisan({
                el: '#latency',
                url: "@chart('latency_chart')?id={{ $domain->id }}",
                hooks: hooks.responsive()
            });

            setInterval(() => {
                console.log('updating chart...');

                chart.update()
            }, 60 * 1000)

        </script>
    @endpush
</div>
