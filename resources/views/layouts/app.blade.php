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
  <style>
    [x-cloak] {
      display: none
    }
  </style>
  <!-- Alpine Plugins -->
  <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/focus@3.x.x/dist/cdn.min.js"></script>
  <!-- Include the Alpine library on your page -->
  <script src="https://unpkg.com/alpinejs" defer></script>
  {{-- tailwind --}}
  @vite('./resources/css/app.css')
  {{-- fontawesome --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  {{-- ionicon --}}
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  @livewireStyles
</head>

<body class="bg-gray-100">
  <div id="app">

    {{-- navbar --}}
    {{-- @include('partials.navbar') --}}

    {{-- sidebar --}}
    @include('partials.sidebar')

    {{-- main section --}}
    <main class="py-5 w-full sm:w-11/12 xl:w-9/12 min-h-[100vh] bg-slate-200 mx-auto">
      <div class="px-5 w-11/12 mx-auto flex items-center justify-end mb-6">
        <span
          class="font-poppins hover:cursor-pointer hover:text-purple-700 flex items-center gap-1 text-[9px] xl:text-[13px]">
          <i class="fa-regular fa-circle-user text-sm"></i> {{ auth()->user()->name }}
        </span>
      </div>
      @yield('content')
    </main>
  </div>

  @livewireScripts
</body>

</html>