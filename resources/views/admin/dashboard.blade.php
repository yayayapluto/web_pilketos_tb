@extends('layouts.private')

@section('content')
<main class="app-main">
    <!--begin::App Content-->
    <div class="app-content">
        <div class="container-fluid mt-4">
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h5>Status Voting</h5>
                        </div>
                        <div class="card-body p-0">
                            <div id="voteStatusChart" style="height: 300px;"></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mb-4">
                    <div class="card">
                        <div class="card-header bg-success text-white">
                            <h5>Perbandingan pemilihan per kandidat</h5>
                        </div>
                        <div class="card-body p-0">
                            <div id="candidateVoteChart" style="height: 300px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end::App Content-->

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        // Voting Status Chart
        const voteStatusOptions = {
            chart: {
                type: 'pie',
                height: '100%', // Make it responsive
            },
            series: @json(array_reverse($voteStatusData)),
            labels: @json(array_reverse($voteStatusLabel)),
            colors: ['#007bff', '#dc3545'], // AdminLTE colors
            title: {
                text: 'Status Voting',
                align: 'center'
            },
        };

        const voteStatusChart = new ApexCharts(document.querySelector("#voteStatusChart"), voteStatusOptions);
        voteStatusChart.render();

        // Candidate Votes Chart
        const candidateVoteOptions = {
            chart: {
                type: 'bar',
                height: '100%', // Make it responsive
            },
            series: [{
                name: 'Votes',
                data: @json($candidateVoteData),
            }],
            xaxis: {
                categories: @json($candidateVoteLabel),
            },
            colors: ['#28a745'], // AdminLTE success color
            title: {
                text: 'Hasil pemilihan',
                align: 'center'
            },
        };

        const candidateVoteChart = new ApexCharts(document.querySelector("#candidateVoteChart"), candidateVoteOptions);
        candidateVoteChart.render();
    </script>
</main>
@endsection
