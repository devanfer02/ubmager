@extends('layout/layout')

@section('content')
  <section class="">
    @include('home.hero')
    <section class="wavyup lg:tw-h-[300px] tw-h-[100px] tw-bg-cover tw-w-full">
    </section>
    @include('home.about')
    <section class="wavydown lg:tw-h-[300px] tw-h-[100px] tw-bg-cover tw-w-full">
    </section>
    @include('home.role')
    @include('home.ticket')
  </section>
@endsection
