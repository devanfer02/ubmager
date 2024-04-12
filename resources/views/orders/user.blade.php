@extends('layout/layout')

@section('content')
  @foreach ($orders as $order)
    <x-order-card :order="$order"/>
  @endforeach
@endsection
