@extends('layouts.app')

@section('content')
    <div id="app">
        @vite('resources/js/report.js')
    </div>

<script>
    window.Laravel = {!! json_encode([
                'chartData' => $chartData,
                'chartOptions' => $chartOptions
            ]) !!}
</script>
@endsection
