@extends('layout/layout')

@section('content')
  <section class="card container tw-border-cst-blue tw-border-2 @if(!$order['selesai'])tw-bg-cst-yellow @endif">
    <section class="tw-p-10">
      <div class="tw-flex">
        <a
          href="{{ route('customer.profile.guest', $order['mahasiswa']) }}"
          class="tw-group"
          >
          <div class="tw-flex tw-mb-5">
            @if($order['mahasiswa']['foto_profil'])
              <img src="{{ $order['mahasiswa']['foto_profil'] }}" alt="">
            @else
              <iconify-icon icon="gg:profile" width="40" height="40" class="tw-text-cst-black {{ $order['selesai'] ? 'group-hover:tw-text-cst-yellow' : 'group-hover:tw-text-white' }}"></iconify-icon>
            @endif
            <h1 class="tw-text-cst-black tw-text-3xl font-semibold tw-ml-10 {{ $order['selesai'] ? 'group-hover:tw-text-cst-yellow' : 'group-hover:tw-text-white' }}">
              {{ $order['mahasiswa']["nama_panggilan"] }}
            </h1>
          </div>
        </a>
        <div class="tw-ml-auto tw-mr-6 lg:tw-mr-10">
          <a href="{{ route('orders.my') }}"><iconify-icon icon="lets-icons:back" width="40" height="40" class="tw-text-cst-black  {{ $order['selesai'] ? 'hover:tw-text-cst-yellow' : 'hover:tw-text-white'}}"></iconify-icon></a>
        </div>
      </div>
      <div class="tw-mb-2">
        <h1 class="tw-text-cst-black tw-text-2xl lg:tw-text-4xl tw-font-bold ">
          {{ $order['judul'] }}
        </h1>
        <div class="tw-bg-cst-black tw-h-[2px] tw-mb-2"></div>
        <table>
          <tbody>
            <tr class="tw-text-cst-black tw-text-lg lg:tw-text-xl tw-font-semibold">
              <td>Lokasi Jemput</td>
              <td class="tw-pl-2">: <span class="tw-pl-2">{{ $order['lokasi_jemput'] }}</span></td>
            </tr>
            <tr class="tw-text-cst-black tw-text-lg lg:tw-text-xl tw-font-semibold">
              <td>Destinasi</td>
              <td class="tw-pl-2">: <span class="tw-pl-2">{{ $order['destinasi'] }}</span></td>
            </tr>
            <tr class="tw-text-cst-black tw-text-lg lg:tw-text-xl tw-font-semibold">
              <td>Upah</td>
              <td class="tw-pl-2">: <span class="tw-pl-2">Rp. {{ $order['upah'] }}</span></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div>
        <p class="tw-text-cst-black lg:tw-text-lg tw-font-semibold">
          {{ $order['detail'] }}
        </p>
      </div>
      <div class="tw-flex tw-mt-2">
        @auth('driver')
        <x-button
          class="hover:tw-text-sky-700 tw-border tw-border-sky-700 tw-bg-sky-700 tw-text-white hover:tw-bg-transparent
          tw-duration-300 tw-ease-in-out"
          action=""
          text="Ambil"
        />
        @endauth
        @if(Auth::guard('mahasiswa')->check() && Auth::guard('mahasiswa')->user()->nim === $order['customer_id'])
          @if(!$order['selesai'])
            <x-button
              class="hover:tw-text-green-700 tw-border tw-border-green-700 tw-bg-green-700 tw-text-white hover:tw-bg-transparent
              tw-duration-300 tw-ease-in-out"
              :action="route('orders.edit', $order['order_id'])"
              text="Edit"
            />
            <form class="" action="{{ route('orders.delete', $order['order_id']) }}" method="POST">
              @csrf
              @method('DELETE')
              <button class="hover:tw-text-red-700 tw-border-red-700 tw-bg-red-700 tw-text-white hover:tw-bg-transparent
              tw-duration-300 tw-ease-in-out tw-rounded-lg tw-pt-1.5 tw-pb-2 px-2 tw-mx-1 tw-border ">
                Cancel
              </button>
            </form >
          @endif
        @endif
      </div>
    </section>
  </section>
@endsection
