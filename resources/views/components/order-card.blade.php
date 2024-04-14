<section
  onclick="location.href = '{{ route('orders.show', $order['order_id']) }}'"
  class="card tw-p-5 tw-mb-3 tw-border-2
  tw-border-cst-blue @if(!$order["selesai"]) tw-bg-cst-yellow tw-group hover:tw-bg-cst-blue  @endif
  tw-duration-300 tw-ease-in-out
  hover:tw-border-cst-yellow tw-cursor-pointer"

>
  <div id="profile">
    {{-- <img src="" alt=""> --}}
    {{-- <h5>{{ $order['nama_lengkap'] }}</h5> --}}
  </div>
  <div class="tw-min-h-[150px]">
    <a href="{{ route('orders.show', $order['order_id']) }}">
      <h2 class="tw-text-xl tw-font-semibold tw-text-cst-black group-hover:tw-text-cst-yellow">{{ $order['judul'] }}</h2>
    </a>
    <div class="tw-text-cst-black group-hover:tw-text-cst-yellow">
      <p>Lokasi Jemput : {{ $order['lokasi_jemput'] }}</p>
      <p>Destinasi : {{ $order['destinasi'] }}</p>
      <br/>
      <p>
        {{ implode(' ', array_slice(explode(" ", $order["detail"]), 0, 10 ) ) }}...
      </p>
    </div>
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
    <p class="tw-mx-1 tw-font-bold pt-1 pb-2 px-2 tw-text-lg group-hover:tw-text-white">
      Rp. {{ $order['upah'] }}
    </p>
  </div>
</section>
