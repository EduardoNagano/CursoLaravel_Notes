@extends('layouts.main_layout')

@section('content')
    <h1>Welcome View and Blade</h1>
    <hr>
    <h3>The value is: <?= $value ?> em PHP exemplo 1</h3>

    <h3>The value is: <?php echo $value ?> em PHP exemplo 2</h3>

    <h3>The value is: {{ $value }} em Blade</h3>
@endsection