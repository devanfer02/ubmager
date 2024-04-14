<nav class="navbar navbar-expand-lg tw-bg-cst-blue fixed-top tw-duration-200 tw-ease-in" id="navbar">
  <div class="container-fluid tw-py-2 lg:tw-px-16">
    <a
      class="tw-text-cst-blue tw-bg-cst-yellow tw-px-2 tw-pb-1
      tw-rounded-md tw-font-bold tw-text-2xl tw-mx-2 tw-duration-300 tw-ease-in-out
      tw-border-cst-yellow hover:tw-bg-cst-blue hover:tw-text-cst-yellow"
      href="/"
    >
      UB Mager
    </a>
    <button class="navbar-toggler tw-text-cst-yellow tw-border-cst-yellow" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <iconify-icon icon="charm:menu-hamburger" class="tw-text-cst-yellow"></iconify-icon>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-lg-0 ">
        @foreach (config('constants.navs') as $nav)
          <li class="nav-item lg:tw-my-0 tw-my-1">
            <a
              class="{{ isActive([$nav['path']]) ? "tw-text-cst-yellow" : "tw-text-white hover:tw-text-gray-400 tw-duration-300 tw-ease-in-out" }}
              tw-mx-3 tw-font-semibold tw-text-lg tw-pt-5 "
              aria-current="page"
              href="{{ $nav['path'] }}"
            >
              {{ $nav['name'] }}
            </a>
          </li>
        @endforeach
        @auth('mahasiswa')
          @foreach (config('constants.userNavs') as $nav)
            <li class="nav-item lg:tw-my-0 tw-my-1">
              <a
              class="{{ isActive([$nav['path']]) ? "tw-text-cst-yellow" : "tw-text-white hover:tw-text-gray-400 tw-duration-300 tw-ease-in-out" }}
                tw-mx-3 tw-font-semibold tw-text-lg tw-pt-5 "
                aria-current="page"
                href="{{ $nav['path'] }}"
              >
                {{ $nav['name'] }}
              </a>
            </li>
          @endforeach
        @endauth
      </ul>
      @php
        $isAuth = false;
        $role = "";
        $name = "";
        if (Auth::guard('mahasiswa')->check()) {
          $isAuth = true;
          $role = "customer";
          $name = Auth::guard('mahasiswa')->user()->nama_lengkap;
        }
        if (Auth::guard('driver')->check()) {
          $isAuth = true;
          $role = "driver";
          $name = Auth::guard('driver')->user()->nama_lengkap;
        }
      @endphp
      @if(!$isAuth)
      <div class="tw-flex tw-justify-start lg:tw-justify-end tw-ml-1.5 lg:tw-mt-0 tw-mt-2" id="auth-nav">
        <x-button
          text="Login"
          action="/auth/customer/login"
          class="tw-rounded-lg py-1 px-2 tw-mx-1 tw-text-cst-blue tw-bg-cst-yellow tw-border tw-border-cst-yellow
          tw-font-bold tw-text-md tw-mr-5 hover:tw-text-cst-yellow hover:tw-bg-cst-blue tw-duration-200 tw-ease-in-out
          "
        />
      </div>
      @else
      <section
      class="lg:tw-flex tw-justify-start lg:tw-justify-end tw-ml-1.5 lg:tw-mt-0 tw-mt-2"
      id="auth-nav"
      >
        <a class="tw-mr-8 tw-flex tw-group" href="{{ route('customer.profile') }}">
          <p class="tw-text-white tw-font-semibold tw-mt-1 tw-mx-2 group-hover:tw-text-cst-yellow tw-hidden lg:tw-inline">
            {{ $name }}
          </p>
          <iconify-icon
            icon="iconamoon:profile-circle-fill"
            class="tw-text-white group-hover:tw-text-cst-yellow"
            width="36"
            height="36"
            >
          </iconify-icon>
          <p class="tw-text-white tw-font-semibold tw-mt-1 tw-ml-6 group-hover:tw-text-cst-yellow lg:tw-hidden">
            {{ $name }}
          </p>
        </a>
        <form
          class="tw-mt-3 lg:tw-mt-0"
          method="post"
          action="{{ route("$role.logout") }}">
          @csrf
          <button
            class="tw-rounded-lg py-1 px-2 tw-mx-1 tw-text-cst-blue tw-bg-cst-yellow tw-border tw-border-cst-yellow
            tw-font-bold tw-text-md tw-mr-5 hover:tw-text-cst-yellow hover:tw-bg-cst-blue tw-duration-200 tw-ease-in-out"
            type="submit"
            >
            Logout
          </button>
        </form>
      </section>
      @endif
    </div>
  </div>
</nav>
