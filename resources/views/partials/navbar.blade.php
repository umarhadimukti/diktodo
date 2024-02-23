<nav
  class="navbar w-7/12 border-b border-slate-300 shadow-lg bg-slate-200 mx-auto p-5 flex font-poppins justify-between">
  <img src="{{ asset('./image/logo_diktodo.png') }}" alt="" width="80">
  @if (auth()->user()->role_id == 1)
  <div class="nav-link flex items-center gap-5">
    <a href="{{ route('user.todo.home') }}" class="flex gap-1 items-center font-bold hover:text-purple-800">
      <ion-icon name="clipboard-outline"></ion-icon>
      Start New Task
    </a>
    <a href="{{ route('admin.todo.dashboard') }}" class="flex gap-1 items-center font-bold hover:text-purple-800">
      <ion-icon name="list-outline" class="text-xl"></ion-icon>
      User List
    </a>
  </div>
  @endif
  <div class="max-w-content flex w-max items-center">
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="submit" class="flex items-center hover:bg-red-500 hover:text-white px-3 py-1 rounded-full"
        onclick="return confirm('Apakah ingin keluar?')">
        <ion-icon name="log-out-outline" class="text-xl"></ion-icon>
        Logout
      </button>
    </form>
  </div>
</nav>