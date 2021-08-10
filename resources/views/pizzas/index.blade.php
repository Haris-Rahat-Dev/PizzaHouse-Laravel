@extends('layouts.app')
@section('title', 'PizzasHouse')
@section('content')
<div class="wrapper pizza-index">
    <h1>Pizza Orders</h1>
    @foreach($pizzas as $pizza)
        <div class="pizza-item">
            {{-- {{ $loop->index }} - {{ $pizza['type'] }} - {{ $pizza['base'] }}
             @if($loop->first)
                 <span> - first in the loop</span>
             @endif
             @if($loop->last)
                 <span> - last in the loop</span>
             @endif--}}
            <img src="/imgs/pizza.png" alt="Pizza icon">
            <h4><a href="/pizzas/{{$pizza->id}}">{{$pizza->name}}</a></h4>
        </div>
    @endforeach
</div>


@endsection
