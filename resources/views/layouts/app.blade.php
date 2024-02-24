<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Todo App | Dikti</title>
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

<body class="bg-gray-100">
  <div id="app">

    {{-- navbar --}}
    @include('partials.navbar')

    {{-- main section --}}
    <main class="py-5 w-7/12 min-h-[90vh] bg-slate-200 mx-auto">
      <div class="px-5 flex justify-end mb-6">
        <span class="flex items-center gap-1 font-poppins text-sm">
          <ion-icon name="person-outline"></ion-icon> {{ auth()->user()->name }}
        </span>
      </div>
      @yield('content')
    </main>
  </div>

  @livewireScripts
</body>

</html>