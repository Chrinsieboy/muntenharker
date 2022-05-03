<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl">
            <div class="main">
                <div class="boxes">
                    <a href="/transactions">
                        <div class="box-expense">
                            <div class="box-header">
                                <h3 class="box-title">Uitgaven deze maand</h3>
                            </div>
                            <div class="box-body">
                                &euro; {{ $transactions_total_uitgaven }} <br>
                                {{-- Laatste transactie: {{ $last_transaction_uitgaven }} --}}
                            </div>
                        </div>
                    </a>
                    <div class="box-total">
                        <div class="box-header">
                            <h3 class="box-title">Totaal aantal munten</h3>
                        </div>
                        <div class="box-body">
                            € {{ $transaction_total }}
                        </div>
                    </div>
                    <a href="/transactions">
                        <div class="box-income">
                            <div class="box-header">
                                <h3 class="box-title">Inkomen deze maand</h3>
                            </div>
                            <div class="box-body">
                                &euro; {{ $transactions_total_inkomen }}<br>
                                {{-- Laatste transactie: {{ $last_transaction_inkomen }} --}}
                            </div>
                        </div>
                    </a>
                </div>

                <div class="boxes-chart">
                    <div class="box-expense-chart">
                        <div class="box-header">
                            <h3 class="box-title">Grafiek Uitgaven</h3>
                        </div>
                        <div class="box-body">
                            {{-- @if ($transactions_total_uitgaven == 0) --}}
                                {{-- <p class="text-center" style="color: #000000">Er zijn geen uitgaven</p> --}}
                            {{-- @else --}}
                                <div class="chart">
                                    <div id="chart2" class="expense-chart"></div>
                                </div>
                            {{-- @endif --}}
                        </div>
                    </div>
                    <div class="box-income-chart">
                        <div class="box-header">
                            <h3 class="box-title">Grafiek Inkomen</h3>
                        </div>
                        <div class="box-body">
                            <div class="chart">
                                <div id="chart1" class="expense-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Charting library -->
            <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
            <!-- Chartisan -->
            <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
            <!-- Chart 1 - Income -->
            <script>
                const chart1 = new Chartisan({
                    el: '#chart1',
                    url: "@chart('income_chart')",
                    hooks: new ChartisanHooks()
                        // .responsive()
                        .legend()
                        .colors()
                        // .title('Inkomen')
                        .tooltip(),
                    loader: {
                        color: 'rgba(255, 161, 0, 0.7)',
                        size: [30, 30],
                        type: 'bar',
                        textColor: 'rgba(255, 161, 0, 0.7)',
                        text: 'Loading some chart data...',
                    },
                    error: {
                        color: 'rgba(255, 161, 0, 0.7)',
                        size: [30, 30],
                        text: 'Ai, problemen, die zijn er om omgelost te worden!',
                        textColor: 'rgba(255, 161, 0, 0.7)',
                        type: 'general',
                        debug: true,
                    },
                });
            </script>
            <!-- Chart 2 - Expenses -->
            <script>
                const chart2 = new Chartisan({
                    el: '#chart2',
                    url: "@chart('expense_chart')",
                    hooks: new ChartisanHooks()
                        .legend()
                        .colors()
                        // .title('Uitgaven')
                        .tooltip(),
                    loader: {
                        color: 'rgba(255, 161, 0, 0.7)',
                        size: [30, 30],
                        type: 'bar',
                        textColor: 'rgba(255, 161, 0, 0.7)',
                        text: 'Loading some chart data...',
                    },
                    error: {
                        color: 'rgba(255, 161, 0, 0.7)',
                        size: [30, 30],
                        text: 'Ai, problemen, die zijn er om omgelost te worden!',
                        textColor: 'rgba(255, 161, 0, 0.7)',
                        type: 'general',
                        debug: true,
                    },
                });
            </script>
        </div>
    </div>
</x-app-layout>
