@extends('layouts.app')
@section('title', 'PizzasHouse')
@section('content')
{{--    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                Pizza id - {{ $id }}
            </div>
        </div>
    </div>--}}
    <div class="wrapper pizza-details">
        <h1>Order By {{$pizza->name}}</h1>
        <p class="type">Type - {{$pizza->type}}</p>
        <p class="base">Base - {{$pizza->base}}</p>
        <p class="toppings">Extra Toppings:</p>
        @if($pizza->toppings == null)
            <p>No Toppings</p>
        @else
            <ul>
                @foreach($pizza->toppings as $topping)
                    <li>{{$topping}}</li>
                @endforeach
            </ul>
        @endif
        <form action="{{route('pizzas.destroy', $pizza->id)}}" method="post">
            @csrf
            @method('DELETE')
            <button>Complete Order</button>
        </form>
    </div>
    <a href="/pizzas"><- Back to all Pizzas</a>
@endsection
