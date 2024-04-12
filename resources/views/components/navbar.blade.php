<nav class="navbar navbar-expand-lg tw-bg-cst-blue">
  <div class="container-fluid tw-py-2 lg:tw-px-10">
    <a
      class="tw-text-cst-blue tw-bg-cst-yellow tw-px-2 tw-pb-1
      tw-rounded-md tw-font-bold tw-text-2xl tw-mx-2 tw-duration-300 tw-ease-in-out
      tw-border-cst-yellow hover:tw-bg-cst-blue hover:tw-text-cst-yellow"
      href="/"
    >
      UB Mager
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-lg-0 ">
        @foreach (config('constants.navs') as $nav)
          <li class="nav-item">
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
        @foreach (config('constants.userNavs') as $nav)
          <li class="nav-item">
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
      </ul>
    </div>
  </div>
</nav>
