<div class="login-component flex justify-evenly items-center h-[90vh] font-poppins">
    <img src="{{ asset('./image/logo_auth.jpg') }}" alt="" width="400">
    <div class="wrapper-form w-2/6">
        <form method="POST" wire:submit.prevent="login">
            <div class="input-area mb-3">
                <label for="email" class="block mb-1">Email Address</label>
                <input type="email" id="email" name="email" placeholder="Email Address.."
                    class="px-5 py-3 w-[300px] bg-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-400 rounded-lg @error('email') ring-2 ring-red-400 @enderror"
                    wire:model.defer="email">
                @error('email')
                <p class="text-red-400">{{ $message }}</p>
                @enderror
            </div>
            <div class="input-area mb-3">
                <label for="password" class="block mb-1">Password </label>
                <input type="password" id="password" name="password" placeholder="Password.."
                    class="px-5 py-3 w-[300px] bg-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-400 rounded-lg @error('password') ring-2 ring-red-400 @enderror"
                    wire:model.defer="password">
                @error('password')
                <p class="text-red-400">{{ $message }}</p>
                @enderror
            </div>
            <div class="input-area mb-3 flex items-center gap-1">
                <input type="checkbox" name="remember" id="remember" wire:model.defer="remember" value="true">
                <label for="remember">Remember me</label>
            </div>
            <button type="submit" name="btn-login"
                class="text-center mt-2 py-3 bg-blue-600 text-white ring-2 rounded-lg w-[300px] hover:bg-slate-200 hover:ring-blue-600 hover:text-black">Login</button>
            <div class="mt-2 text-slate-600">
                <p>
                    Belum punya akun?
                    <a href="{{ route('register') }}" class="text-blue-600">Daftar Akun</a>
                </p>
            </div>
        </form>
    </div>
</div>