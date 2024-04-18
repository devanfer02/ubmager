@extends('layout/layout')

@section('content')
  <section class="">
    <section class="tw-flex tw-flex-wrap">
      <section class="tw-w-1/3 tw-flex tw-justify-center">
        <img
          src="{{ $mahasiswa['foto_profil'] ?: asset('assets/img/default.jpg')}}"
          alt="photoprofile"
          class="tw-max-w-[100px] tw-max-h-[100px] lg:tw-max-w-[150px] lg:tw-max-h-[150px] tw-rounded-full
          tw-border tw-border-cst-blue">
      </section>
      <section class="tw-w-2/3 tw-self-center tw-text-cst-black ">
        <section>
          <h1 class=" tw-font-semibold tw-text-xl lg:tw-text-3xl">
            {{ $mahasiswa['nama_lengkap'] }}
          </h1>
          <p>Fakultas {{ $mahasiswa['fakultas'] }}</p>
          <p>{{ $mahasiswa['program_studi'] }}</p>
          <section class="tw-hidden lg:tw-flex tw-text-cst-blue tw-mt-3">
            <section class="tw-flex">
              <p class="">{{ sizeof($mahasiswa['orders']) }} Orders</p>
              <p class="tw-ml-5">{{ sizeof($availableOrders) }} Available Orders</p>
              <p class="tw-ml-5">{{ sizeof($completedOrders) }} Completed Orders</p>
            </section>
          </section>
          @auth('mahasiswa')
          @if($mahasiswa['nim'] === Auth::guard('mahasiswa')->user()->nim)
          <section class="tw-w-1/2 tw-mt-1 tw-hidden lg:tw-block">
            <a
              href="{{ route('customer.edit', $mahasiswa['nim']) }}"
              class="hover:tw-border-cst-blue hover:tw-bg-cst-yellow tw-duration-300 tw-ease-in-out tw-font-semibold btn tw-border tw-border-cst-blue tw-w-full tw-text-cst-blue">
              Edit Profile
            </a>
          </section>
          @endif
          @endauth
        </section>
      </section>
    </section>
    <section class="tw-flex tw-justify-center lg:tw-hidden tw-mt-3 tw-text-cst-blue">
      <section class="tw-flex tw-text-sm">
        <p class="">{{ sizeof($mahasiswa['orders']) }} Orders</p>
        <p class="tw-ml-5">{{ sizeof($availableOrders) }} Available Orders</p>
        <p class="tw-ml-5">{{ sizeof($completedOrders) }} Completed Orders</p>
      </section>
    </section>
    @auth('mahasiswa')
    @if($mahasiswa['nim'] === Auth::guard('mahasiswa')->user()->nim)
    <section class="tw-w-full tw-px-5 tw-mt-1 lg:tw-hidden">
      <a
        href="{{ route('customer.edit', $mahasiswa['nim']) }}"
        class="hover:tw-border-cst-blue hover:tw-bg-cst-yellow tw-duration-300 tw-ease-in-out tw-font-semibold btn tw-border tw-border-cst-blue tw-w-full tw-text-cst-blue">
        Edit Profile
      </a>
    </section>
    @endif
    @endauth
    <section>
      @livewire('user-orders', ['availableOrders' => $availableOrders, 'completedOrders' => $completedOrders])
    </section>
  </section>
@endsection
