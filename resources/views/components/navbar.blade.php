<nav class="navbar navbar-expand-lg tw-bg-cst-blue fixed-top">
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
      <span class="navbar-toggler-icon tw-text-cst-yellow"></span>
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
        if (Auth::guard('mahasiswa')->user()) {
          $isAuth = true;
          $role = "customer";
        }
        if (Auth::guard('driver')->user()) {
          $isAuth = true;
          $role = "driver";
        }
      @endphp

      @if(!$isAuth)
      <div class="tw-flex tw-justify-start lg:tw-justify-end tw-ml-1.5 lg:tw-mt-0 tw-mt-2" id="auth-nav">
        <x-button
          text="Login"
          action="/auth/customer/login"
          class="tw-text-cst-blue tw-bg-cst-yellow tw-border tw-border-cst-yellow
          tw-font-bold tw-text-md tw-mr-5 hover:tw-text-cst-yellow hover:tw-bg-cst-blue tw-duration-200 tw-ease-in-out
          "
        />
      </div>
      @else
      <form
        class="tw-flex tw-justify-start lg:tw-justify-end tw-ml-1.5 lg:tw-mt-0 tw-mt-2"
        id="auth-nav"
        method="post"
        action="{{ route('customer.logout') }}">
        @csrf 
        <button
          class="tw-rounded-lg py-1 px-2 tw-mx-1 tw-text-cst-blue tw-bg-cst-yellow tw-border tw-border-cst-yellow
          tw-font-bold tw-text-md tw-mr-5 hover:tw-text-cst-yellow hover:tw-bg-cst-blue tw-duration-200 tw-ease-in-out"
          type="submit"
        >
        Logout
        </button>
      </form>
      @endif
    </div>
  </div>
</nav>
