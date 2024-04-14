@extends('layout/layout')

@section('content')
  <section class="container card tw-border-2 tw-border-cst-black tw-bg-cst-yellow ">
    <section class="tw-pt-5 tw-px-5">
      <h1 class="tw-text-3xl tw-font-semibold tw-text-cst-black">
        Create Order
      </h1>
      <div class="tw-h-[2px] tw-bg-cst-black"></div>
    </section>
    <form class="tw-p-5" action="{{ route('orders.create') }}" method="post">
      @csrf
      <x-input
        type="text"
        name="Judul"
        id="judul"
        placeHolder="Judul Layanan"
        class="i"
        value="{{ old('judul') }}"
        required
      />
      <x-input
        type="text"
        name="Upah (Rupiah)"
        id="upah"
        placeHolder="10000"
        class=""
        value="{{ old('upah') }}"
        required
      />
      <x-input
        type="text"
        name="Lokasi Jemput"
        id="lokasi_jemput"
        placeHolder="Lokasi Jemput"
        class="emput') i"
        value="{{ old('lokasi_jemput') }}"
        required
      />
      <x-input
        type="text"
        name="Destinasi"
        id="destinasi"
        placeHolder="Destinasi"
        class="i') i"
        value="{{ old('destinasi') }}"
        required
      />
      <x-input
        type="file"
        name="Foto"
        id="foto"
        placeHolder=""
        class=""
        value="{{ old('foto') }}"
      />
      <div class="mb-3">
        <label for="detail" class="form-label tw-text-cst-black tw-font-semibold">Detail  <span class="tw-text-red-600"> *</span></label>
        <textarea
          name="detail"
          id="detail"
          cols="30"
          rows="8"
          class="form-control shadow-none tw-border tw-border-cst-black" style="resize:none;"></textarea>
        @error('detail')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
        @enderror
      </div>
      <button
        type="submit"
        class="tw-px-3 tw-py-1.5 tw-bg-cst-yellow tw-border-2 tw-font-semibold tw-border-cst-blue
        hover:tw-bg-cst-blue hover:tw-text-cst-yellow tw-duration-200 tw-ease-in-out tw-rounded-lg"
      >
        Order
      </button>
    </form>
  </section>
@endsection
