@extends('layouts.dashboard')

@section('content')
    <div class="container bg-light mb-5">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center pt-3">LE TUE STATISTICHE</h2>
                <canvas id="stats"></canvas>
            </div>
        </div>
    </div>
    {{-- <div class="container bg-light">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center pt-3">LE TUE VISUALIZZAZIONI</h2>
                <canvas id="clicks"></canvas>
            </div>    
        </div>    
    </div>    --}}

        {{-- <h2>Messaggi</h2>
        @foreach ($leads as $lead)
            <p>
                {{ $date = $lead->created_at->toDateString()}}
                {{ $date = explode("-", $lead->created_at->toDateString())}}

                
                    $day = $date[2];
                    $month = $date[1];
                    $year = $date[0]; 
               
            </p>
        @endforeach --}}

        {{-- <h2>Clicks</h2>
        @foreach ($clicks as $click)
            <p>
                {{ $date = $lead->created_at->toDateString()}}
            </p>
        @endforeach --}}

    <script>
        // primo diagramma
        let leadsChart = document.getElementById('stats').getContext('2d');

        let firstChart = new Chart(leadsChart, {
            type: 'bar', //bar, pie, line, doughnut, radar, polarArea
            data: {
                labels: ['Leads', 'Clicks'],
                datasets: [{
                    label: 'Appartment stats',
                    data: [
                        {{count($leads)}},
                        {{count($clicks)}}
                    ],
                    backgroundColor: [
                        'red',
                        'green'
                        // 'yellow',
                        // 'purple',
                        // 'orange',
                        // 'blue'
                    ],
                    borderWidth: 1,
                    borderColor: 'grey',
                    hoverBorderWidth: 3,
                    hoverBorderColor: 'black'
                }]
            }
        });

        // secondo diagramma
        // let clicksChart = document.getElementById('clicks').getContext('2d');

        // let secondChart = new Chart(clicksChart, {
        //     type: 'bar', //bar, pie, line, doughnut, radar, polarArea
        //     data: {
        //         labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        //         datasets: [{
        //             label: 'Clicks on your appartment',
        //             data: [
        //                 41,
        //                 43,
        //                 33,
        //                 76,
        //                 138,
        //                 61,
        //                 84,
        //                 32,
        //                 190,
        //                 149,
        //                 173,
        //                 107
        //             ],
        //             backgroundColor: [
        //                 'red',
        //                 'green',
        //                 'yellow',
        //                 'purple',
        //                 'orange',
        //                 'blue'
        //             ],
        //             borderWidth: 1,
        //             borderColor: 'grey',
        //             hoverBorderWidth: 3,
        //             hoverBorderColor: 'black'
        //         }]
        //     }
        // });
    </script>
@endsection