@extends('layouts.app')

@section('content')
    <div id="app">
    </div>
<script>
    window.chartData = '{!! json_encode($chartData) !!}'
    window.chartOptions = '{!! json_encode($chartOptions) !!}'
    window.orders = '{!! json_encode($orders) !!}'
</script>
<script src="{{ mix('js/report.js') }}"></script>
@endsection
