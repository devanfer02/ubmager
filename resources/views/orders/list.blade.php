@extends('layout/layout')

@section('content')
  <section class="tw-flex">
    <x-button
      class="tw-text-sky-700 tw-border-sky-700 tw-w-32 lg:tw-w-28 tw-text-center hover:tw-bg-sky-700 hover:tw-text-white
      tw-duration-300 tw-ease-in-out"
      action="{{ route('orders.create') }}"
      text="Add Order"
    />
    <input
      type="text"
      class="form-control shadow-none tw-border-1 tw-border-cst-blue"
      placeholder="Search">
  </section>
  @if (count($orders) == 0)
  <section class="text-center tw-font-bold tw-text-2xl tw-mt-44">
    <p>There is no order yet.</p>
    <p> Go <a href="" class="tw-text-cst-yellow">create your new order!</a> </p>
  </section>
  @else
    <section class="tw-grid tw-grid-cols-1 md:tw-grid-cols-2 gap-2 lg:tw-gap-5 mt-3">
      @foreach ($orders as $order)
        <x-order-card :order="$order"/>
      @endforeach
    </section>
    @endif
@endsection
