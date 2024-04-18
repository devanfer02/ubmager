@extends('layout/layout')

@section('content')
  <section class="tw-container tw-flex tw-justify-center">
    <section>
      <img
        src="{{ $mahasiswa['foto_profil'] ?: asset('assets/img/default.jpg')}}"
        alt="photoprofile"
        class="tw-max-w-[100px] tw-max-h-[100px] lg:tw-max-w-[150px] lg:tw-max-h-[150px] tw-rounded-full
        tw-border tw-border-cst-blue">
      <form action="" method="POST">
        @csrf
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </section>
  </section>
@endsection
