@extends('layouts.visitor')

@section('content')
    <div class="container">

        @foreach ($products as $product)
            <p> {{ $product->name }} </p>
        @endforeach

    </div>

@stop
