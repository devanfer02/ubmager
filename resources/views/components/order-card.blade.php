<section class="card tw-p-5 tw-mb-3 tw-border-2 tw-border-cst-blue tw-bg-cst-yellow">
  <div>
    {{-- <img src="" alt=""> --}}
    <h5>{{ $order['username'] }}</h5>
  </div>
  <a href="/orders/{{ $order["order_id"] }}">
    <h2 class="tw-text-xl tw-font-semibold tw-text-black">{{ $order['judul'] }}</h2>
  </a>
  <div class="tw-text-black">
    <p>Lokasi Jemput : {{ $order['lokasi_jemput'] }}</p>
    <p>Destinasi : {{ $order['destinasi'] }}</p>
    <br/>
    <p>
      {{ $order['detail'] }}
    </p>
  </div>
  <div class="tw-flex tw-mt-2">
    {{-- <button class="btn btn-primary tw-mr-1">
      Ambil // hanya bisa muncul apabila rolenya driver
    </button> --}}
    <x-button
      class="hover:tw-text-green-700 tw-border tw-border-green-700 tw-bg-green-700 tw-text-white hover:tw-bg-transparent
      tw-duration-300 tw-ease-in-out"
      action=""
      text="Edit"
    />
    <x-button
      class="hover:tw-text-red-700 tw-border tw-border-red-700 tw-bg-red-700 tw-text-white hover:tw-bg-transparent
      tw-duration-300 tw-ease-in-out"
      action=""
      text="Cancel"
    />
    <p class="tw-mx-1 tw-font-bold pt-1 pb-2 px-2 tw-text-lg">
      Rp. {{ $order['upah'] }}
    </p>
    {{-- <x-button
      class="tw-text-black tw-border tw-border-black"
      action=""
      :text="'Rp. ' . $order['upah']"
    /> --}}
  </div>
</section>
