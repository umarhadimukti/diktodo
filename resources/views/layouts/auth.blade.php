<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Todo App | Dikti</title>
  <link rel="icon" type="image/x-icon" href="{{ asset('./image/favicon-diktodo.png') }}">

  {{-- google fonts --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@200..900&family=Inter&family=Poppins:wght@300;400;500;600&display=swap"
    rel="stylesheet">
  {{-- tailwind --}}
  @vite('./resources/css/app.css')
  {{-- alpine --}}
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  {{-- ionicon --}}
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  @livewireStyles
</head>

<body>
  <div id="app">

    {{-- main section --}}
    <main class="py-5 w-10/12 mx-auto">
      @yield('content')
    </main>

  </div>

  @livewireScripts
</body>

</html>