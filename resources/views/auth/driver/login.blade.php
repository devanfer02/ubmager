@extends('layout/auth-layout')

@section('content')
  <section class="container tw-flex tw-flex-row tw-justify-center tw-items-center tw-h-screen">
    <section class="tw-bg-cst-yellow tw-flex tw-flex-col md:tw-flex-row tw-p-10 lg:tw-p-20 tw-rounded-lg tw-border-4 tw-border-cst-black">
      <section class="lg:tw-w-1/2 tw-w-full tw-mx-1 tw-flex tw-flex-row tw-justify-center tw-items-center lg:tw-mr-10">
        <section class="tw-max-w-[150px] lg:tw-max-w-[300px]">
          <img src="{{ asset('assets/img/auth2.png') }}" alt="img">
          <p class="tw-text-xl tw-text-cst-black tw-font-bold tw-mb-1 tw-text-center">
            Welcome to UB Mager App
          </p>
        </section>
      </section>
      <form class="lg:tw-w-1/2 tw-w-full tw-mx-1 lg:tw-mt-0 tw-mt-2">
        <h1 class="tw-font-semibold tw-text-cst-black tw-text-2xl">Login</h1>
        <div class="tw-text-cst-black tw-bg-cst-black tw-h-[2px] tw-mb-5">
        </div>
        <x-input name="NIM" placeHolder="Enter your NIM" type="text" id="nim"/>
        <x-input name="Password" placeHolder="Enter your Password" type="password" id="password"/>
        <h1 class="tw-text-cst-black tw-font-semibold tw-mb-2">
          Customer? <a href="/auth/customer/login" class="tw-underline">Login to your account</a>
        </h1>
        <p class="tw-text-md tw-text-cst-black tw-font-semibold tw-mb-5">
          Doesn't have account ? <a href="/auth/driver/register" class="tw-underline">Register</a>
        </p>
        <div class="flex">
          <button type="submit" class="btn tw-bg-cst-blue tw-text-white tw-font-semibold tw-border tw-border-cst-blue">
            Login
          </button>
          <a href="/" class="tw-underline tw-mx-2 tw-mt-1">Back to home</a>
        </div>
      </form>
    </section>
  </section>
@endsection
