@extends('layouts.private')

@section('content')
<main class="app-main">
    <!--begin::App Content-->
    <div class="app-content">
        <div class="container-fluid mt-4">
            <h2 class="mb-3">Detail data pemilihan</h2>
            <div class="card">
                <div class="card-body p-0" style="max-height: 300px; overflow-y: auto; border: 1px solid #dee2e6;">
                    <table class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                                <th>NISN</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Kandidat</th>
                                <th>Waktu</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transactionData as $transaction)
                                <tr>
                                    <td>{{ $transaction['nisn'] }}</td>
                                    <td>{{ $transaction['name'] }}</td>
                                    <td>{{ $transaction['class'] }}</td>
                                    <td>{{ $transaction['candidate'] }}</td>
                                    <td>{{ $transaction['time'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <h2 class="mb-4 mt-4">Data pemmilihan per periode</h2> <!-- Added margin for spacing -->
            <div class="card">
                <div class="card-body p-0">
                    <div id="votesByPeriodChart" style="height: 300px;"></div>
                </div>
            </div>
        </div>
    </div>
    <!--end::App Content-->

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        // Votes by Period Chart
        const votesByPeriodOptions = {
            chart: {
                type: 'bar',
                height: '100%',
                toolbar: {
                    show: false,
                },
            },
            series: [{
                name: 'Votes',
                data: @json($voteByPeriodData),
            }],
            xaxis: {
                categories: @json($voteByPeriodLabel),
            },
            colors: ['#007bff'], // AdminLTE primary color
            title: {
                text: 'Pemilihan per periode',
                align: 'center',
            },
            dataLabels: {
                enabled: true,
            },
        };

        const votesByPeriodChart = new ApexCharts(document.querySelector("#votesByPeriodChart"), votesByPeriodOptions);
        votesByPeriodChart.render();
    </script>
</main>
@endsection
