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
  @if(session('success'))
    <div class="alert tw-flex tw-border-green-600 tw-text-green-600 tw-mt-3 tw-font-semibold alert-dismissible" role="alert">
      <iconify-icon icon="mdi:success" width="26" height="26"></iconify-icon>
      <p class="tw-ml-3">{{ session('success') }}</p>
      <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif
  @if(session('failure'))
    <div class="alert tw-flex tw-border-red-600 tw-text-red-600 tw-mt-3 tw-font-semibold alert-dismissible" role="alert">
      <iconify-icon icon="mdi:warning" width="26" height="26"></iconify-icon>
      <p class="tw-ml-3">{{ session('failure') }}</p>
      <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif
  @if (count($orders) == 0)
  <section class="text-center tw-font-bold tw-text-2xl tw-mt-44">
    <p>There is no order yet.</p>
    <p> Go <a href="" class="tw-text-cst-yellow">create your new order!</a> </p>
  </section>
  @else
    <section class="tw-grid tw-grid-cols-1 md:tw-grid-cols-2 lg:tw-grid-cols-3 gap-2 lg:tw-gap-5 mt-3">
      @foreach ($orders as $order)
        <x-order-card :order="$order"/>
      @endforeach
    </section>
    @endif
@endsection
