
@extends('layouts.user')
@section('content')

@foreach(auth()->user()->cart as $item)

    {{$item->product->title}}  {{$item->quantity}}

@endforeach

@endsection
