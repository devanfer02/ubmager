<section class="tw-flex tw-flex-wrap tw-bg-white tw-container tw-jusitfy-center" id="hero">
  <section class="md:tw-w-1/2 lg:tw-hidden tw-w-full tw-mt-5 lg:tw-mt-0 tw-flex tw-justify-center md:tw-justify-start">
    <img
      src="{{ asset('assets/img/hero.jpg') }}"
      alt="hero"
      class="lg:tw-max-w-[500px] tw-max-w-[350px]"
    >
  </section>
  <section class="lg:tw-w-1/2 hidden lg:tw-block tw-self-center lg:tw-pl-20 tw-pl-3 tw-flex tw-justify-center md:tw-justify-start" >
    <div class="tw-mb-2 tw-pl-1">
      <h1 class="tw-text-5xl tw-font-bold tw-text-cst-blue">UB Mager</h1>
      <p class="tw-text-lg lg:tw-text-xl tw-font-semibold tw-text-cst-blue">Your solution for being such a lazy person</p>
      @auth('mahasiswa')
        <p class="tw-text-lg lg:tw-text-xl tw-font-semibold tw-text-cst-blue">
          Welcome back, {{ Auth::guard('mahasiswa')->user()->nama_panggilan }}
        </p>
      @endauth
      @auth('driver')
        <p class="tw-text-lg lg:tw-text-xl tw-font-semibold tw-text-cst-blue">
          Welcome back, {{ Auth::guard('driver')->user()->nama_lengkap }}
        </p>
      @endauth
      @php
        $action = "/auth/customer/login";
        if (Auth::guard('mahasiswa')->check()) {
          $action = "/orders/my";
        }
        if (Auth::guard('driver')->check()) {
          $action = "/orders/list";
        }
      @endphp
      <div class="tw-mt-2 tw-h-1">
      </div>
      <x-button
        text="Get Started"
        class="tw-border-cst-black tw-py-2 px-3 tw-bg-cst-yellow tw-font-semibold tw-text-lg lg:tw-text-xl
        tw-text-cst-blue tw-duration-300 tw-ease-in-out hover:tw-bg-cst-blue hover:tw-text-cst-yellow"
        :action="$action"
      />
    </div>
  </section>
  <section class="md:tw-w-1/2 tw-hidden tw-w-full tw-mt-5 lg:tw-mt-0 lg:tw-flex tw-justify-center md:tw-justify-start">
    <img
      src="{{ asset('assets/img/hero.jpg') }}"
      alt="hero"
      class="lg:tw-max-w-[500px] tw-max-w-[350px]"
    >
  </section>
</section>
