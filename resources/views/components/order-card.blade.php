<section class="card tw-p-5 tw-mb-3 tw-border-2 tw-border-cst-blue tw-bg-cst-yellow">
  <div>
    {{-- <img src="" alt=""> --}}
    <h5>{{ $order['username'] }}</h5>
  </div>
  <a href="/orders/{{ $order["order_id"] }}">
    <h2 class="tw-text-xl tw-font-semibold tw-text-black">{{ $order['judul'] }}</h2>
  </a>
  <div>
    <p>Lokasi Jemput : {{ $order['lokasi_jemput'] }}</p>
    <p>Destinasi : {{ $order['destinasi'] }}</p>
  </div>
  </br>
  <p>
    {{ $order['detail'] }}
  </p>
  <div class="tw-flex tw-mt-2">
    {{-- <button class="btn btn-primary tw-mr-1">
      Ambil // hanya bisa muncul apabila rolenya driver
    </button> --}}
    <x-button
      class="tw-text-green-700 tw-border tw-border-green-700 hover:tw-bg-green-700 hover:tw-text-white
      tw-duration-300 tw-ease-in-out"
      action=""
      text="Edit"
    />
    <x-button
      class="tw-text-red-700 tw-border tw-border-red-700 hover:tw-bg-red-700 hover:tw-text-white
      tw-duration-300 tw-ease-in-out"
      action=""
      text="Batalkan"
    />
    <x-button
      class="tw-text-black tw-border tw-border-black"
      action=""
      :text="'Rp. ' . $order['upah']"
    />
  </div>
</section>
