<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://code.iconify.design/iconify-icon/2.0.0/iconify-icon.min.js"></script>
  @vite('resources/css/app.css')
  @vite('resources/js/app.js')
  <title>{{ $pageTitle }}</title>
</head>
<body class="">
  @include('components/navbar')
  <main
    class="{{ Request::is('/') ? "tw-mt-24 lg:tw-mt-16" : "tw-mt-24 tw-container" }}  tw-min-h-[100%]"
    id="main">
    @yield('content')
  </main>
  @include('components/footer')
</body>
</html>
