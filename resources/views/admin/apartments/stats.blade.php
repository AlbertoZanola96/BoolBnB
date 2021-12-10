@extends('layouts.dashboard')

@section('title')
    | Statistiche
@endsection

@section('content')
    <div class="container my-4">
        {{-- pulsante torna  --}}
        <div class="row">
            <div class="col-12">
                <a class="btn btn-secondary shadow" href="{{ route('admin.apartments.index') }}"><span>&#8592;</span> Torna ai tuoi immobili</a>
            </div>
        </div>
    </div>

    {{-- stats --}}
    <div class="container bg-light mb-5">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center pt-3">Statistiche {{ $apartment->name }}</h2>
                <canvas id="stats"></canvas>
            </div>
        </div>
    </div>

    <script>
        
        // primo diagramma
        let leadsChart = document.getElementById('stats').getContext('2d');
        // trasform data ricevuto dal serve in json
       let leadsPerMonth = JSON.parse('<?php echo json_encode($leadsPerMonth) ?>');
       let clicksPerMonth = JSON.parse('<?php echo json_encode($clicksPerMonth) ?>');
    
        let firstChart = new Chart(leadsChart, {
            type: 'line', //bar, pie, line, doughnut, radar, polarArea
            data: {
                labels: ['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'],
                datasets: [
                    {
                    label: 'Messaggi Ricevuti',
                    data: [
                        leadsPerMonth[0],
                        leadsPerMonth[1],
                        leadsPerMonth[2],
                        leadsPerMonth[3],
                        leadsPerMonth[4],
                        leadsPerMonth[5],
                        leadsPerMonth[6],
                        leadsPerMonth[7],
                        leadsPerMonth[8],
                        leadsPerMonth[9],
                        leadsPerMonth[10],
                        leadsPerMonth[11]
                    ],
                    backgroundColor: [
                        'red'
                    ],
                    borderWidth: 1,
                    borderColor: 'grey',
                    hoverBorderWidth: 2,
                    hoverBorderColor: 'black'
                },
                {
                    label: 'Clicks',
                    data: [
                        clicksPerMonth[0],
                        clicksPerMonth[1],
                        clicksPerMonth[2],
                        clicksPerMonth[3],
                        clicksPerMonth[4],
                        clicksPerMonth[5],
                        clicksPerMonth[6],
                        clicksPerMonth[7],
                        clicksPerMonth[8],
                        clicksPerMonth[9],
                        clicksPerMonth[10],
                        clicksPerMonth[11]
                    ],
                    backgroundColor: [
                        'green'
                    ],
                    borderWidth: 1,
                    borderColor: 'grey',
                    hoverBorderWidth: 2,
                    hoverBorderColor: 'black'
                }]
            }
        });
    </script>
@endsection