@extends('layout/layout')

@section('content')
  <section class="tw-flex">
    <x-button
      class="tw-text-sky-700 tw-border-sky-700 tw-w-32 lg:tw-w-28 tw-text-center hover:tw-bg-sky-700 hover:tw-text-white
      tw-duration-300 tw-ease-in-out"
      action="{{ route('orders.create') }}"
      text="Add Order"
    />
    <form action="{{ route(Route::currentRouteName()) }}" class="tw-flex tw-w-full">
      <input
        type="text"
        class="form-control shadow-none tw-border-1 tw-border-cst-blue"
        placeholder="Search..."
        value="{{ request('search') }}"
        name="search"
        />
      <button class="tw-text-green-700 tw-border-green-700 tw-w-32 lg:tw-w-28 tw-text-center hover:tw-bg-green-700 hover:tw-text-white
      tw-duration-300 tw-ease-in-out tw-rounded-lg px-2 tw-mx-1 tw-border">Search</button>
      <button type="button" class="btn tw-border-blue-600 hover:tw-bg-blue-600 tw-group" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        <iconify-icon icon="mdi:filter" class="tw-text-blue-600 group-hover:tw-text-white"></iconify-icon>
      </button>
    </form>
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
  <section class="text-center tw-font-bold tw-text-3xl tw-mt-44">
    @if(request('search'))
      <p class="tw-text-cst-black ">No order found</p>
    @else
      <p>There is no order yet.</p>
      <p> Go <a href="" class="tw-text-cst-yellow">create your new order!</a> </p>
    @endif
  </section>
  @else
    <section class="tw-grid tw-grid-cols-1 md:tw-grid-cols-2 lg:tw-grid-cols-3 gap-2 lg:tw-gap-5 mt-3">
      @foreach ($orders as $order)
        <x-order-card :order="$order"/>
      @endforeach
    </section>
    @endif
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form class="modal-content" action="{{ route(Route::currentRouteName()) }}">
        <div class="modal-header">
          <h1 class="modal-title tw-font-semibold tw-text-cst-blue tw-text-xl" id="staticBackdropLabel">Advanced Filter</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <label for=""></label>
          <x-input id="judul" name="Judul" placeHolder="Masukkan judul order" value="{{ request('customer') }}"/>
          <x-input id="customer" name="Customer" placeHolder="Masukkan nama customer" value="{{ request('customer') }}"/>
          <div class="tw-flex tw-w-full tw-flex-row">
            <x-input id="minupah" name="Minimal Upah (Rp)"  placeHolder="10000" value="{{ request('minupah') }}"/>
            <x-input id="maxupah" name="Maksimal Upah (Rp)"  placeHolder="50000" value="{{ request('maxupah') }}"/>
          </div>
          <x-input id="lokasi" name="Lokasi Jemput" placeHolder="FILKOM GKM" value="{{ request('lokasi') }}"/>
          <x-input id="destinasi" name="Destinasi" placeHolder="Gedung FEB" value="{{ request('destinasi') }}"/>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Search</button>
        </div>
      </form>
    </div>
  </div>

@endsection
