<section class="tw-container tw-flex tw-justify-center" id="role">
  <section class="tw-flex tw-flex-wrap tw-jusitfy-center">
    <section class="lg:tw-w-1/2 tw-w-full tw-flex lg:tw-p-10 tw-justify-center md:tw-justify-start">

        <section
          class="lg:tw-px-0 tw-px-3 tw-border-2 tw-border-cst-blue tw-py-5 tw-rounded-lg
          hover:tw-bg-cst-blue tw-group tw-duration-200 tw-ease-in-out tw-my-3
          hover:tw-border-cst-yellow tw-cursor-pointer"
          onclick="location.href = '{{ Auth::guard('mahasiswa')->check() ? '/orders/my?selesai=false' : '/auth/customer/login' }}'"

        >
          <section class="tw-flex tw-justify-center">
            <img
              src="{{ asset('assets/img/customerillust.png') }}"
              alt="customer"
              class="lg:tw-max-w-[450px] tw-max-w-[300px]"
            >
          </section>
          <h1 class="tw-text-cst-blue tw-font-bold tw-text-center tw-text-3xl group-hover:tw-text-cst-yellow tw-duration-200 tw-ease-in-out">
            Customer
          </h1>
          <p class="tw-text-cst-blue tw-font-semibold group-hover:tw-text-white tw-duration-200 tw-ease-in-out tw-px-10 tw-py-5">
            Join our UB Mager community and access a world of assistance at your fingertips. Whether you need help with errands, homework, or shopping, our network of helpful individuals is here to lend a hand. Connect with fellow students and enjoy hassle-free solutions to your daily tasks.
          </p>
        </section>

    </section>
    <section class="lg:tw-w-1/2 tw-w-full lg:tw-p-10 lg:tw-mt-0 tw-flex tw-justify-center md:tw-justify-start">

        <section
          class="lg:tw-px-0 tw-px-3 tw-border-2 tw-border-cst-blue tw-py-5 tw-rounded-lg
          hover:tw-bg-cst-blue tw-group tw-duration-200 tw-ease-in-out tw-my-3
          hover:tw-border-cst-yellow tw-cursor-pointer"
          onclick="location.href = '{{ Auth::guard('mahasiswa')->check() ? '/orders/list?selesai=false' : '/auth/driver/login' }}'"
        >
          <section class="tw-flex tw-justify-center">
            <img
            src="{{ asset('assets/img/driverillust.png') }}"
            alt="driver"
            class="lg:tw-max-w-[450px] tw-max-w-[300px]"
            >
          </section>
          <h1 class="tw-text-cst-blue tw-font-bold tw-text-center tw-text-3xl group-hover:tw-text-cst-yellow tw-duration-200 tw-ease-in-out">
            Driver
          </h1>
          <p class="tw-text-cst-blue tw-font-semibold group-hover:tw-text-white tw-duration-200 tw-ease-in-out tw-px-10 tw-py-5">
            Ready to make a difference? Become a part of the UB Mager team and help fellow students by providing transportation services. Whether it's escorting to campus, running errands, or assisting with deliveries, your support is invaluable. Join us in creating a more connected and supportive community at Universitas Brawijaya.
          </p>
        </section>

    </section>
  </section>
</section>
