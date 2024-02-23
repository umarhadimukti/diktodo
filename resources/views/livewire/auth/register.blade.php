<div class="login-component flex justify-evenly items-center h-[90vh] font-poppins">
    <img src="{{ asset('./image/logo_auth.jpg') }}" alt="" width="400">
    <div class="wrapper-form w-2/6">
        <form wire:submit.prevent="register">
            <div class="input-area mb-3">
                <label for="name" class="block mb-1">Nama Lengkap</label>
                <input type="text" id="name" name="name" placeholder="Nama Lengkap.."
                    class="px-5 py-3 w-[300px] bg-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-400 rounded-lg @error('name') ring-2 ring-red-400 @enderror"
                    wire:model="name" value="{{ old('name') }}">
                @error('name')
                <div class="text-red-400">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="input-area mb-3">
                <label for="username" class="block mb-1">Username</label>
                <input type="text" id="username" name="username" placeholder="Username.."
                    class="px-5 py-3 w-[300px] bg-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-400 rounded-lg @error('username') ring-2 ring-red-400 @enderror"
                    wire:model="username" value="{{ old('username') }}">
                @error('username')
                <div class="text-red-400">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="input-area mb-3">
                <label for="email" class="block mb-1">Email Address</label>
                <input type="email" id="email" name="email" placeholder="Email Address.."
                    class="px-5 py-3 w-[300px] bg-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-400 rounded-lg @error('email') ring-2 ring-red-400 @enderror"
                    wire:model="email" value="{{ old('email') }}">
                @error('email')
                <div class="text-red-400">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="input-area mb-3">
                <label for="password" class="block mb-1">Password </label>
                <input @if($showPassword==false) type="password" @else type="text" @endif id="password_confirmation"
                    id="password" name="password" placeholder="Password.."
                    class="px-5 py-3 w-[300px] bg-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-400 rounded-lg @error('password') ring-2 ring-red-400 @enderror"
                    wire:model="password">
                @error('password')
                <div class="text-red-400">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="input-area mb-3">
                <label for="password_confirmation" class="block mb-1">Konfirmasi Password</label>
                <input @if($showPassword==false) type="password" @else type="text" @endif id="password_confirmation"
                    name="password_confirmation" placeholder="Konfirmasi Password.."
                    class="px-5 py-3 w-[300px] bg-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-400 rounded-lg"
                    wire:model="password_confirmation" required>
            </div>
            <div class="input-area mb-3 flex items-center gap-1">
                <input type="checkbox" id="show_password" value="show" wire:model.live="showPassword">
                <label for="show_password">Show Password</label>
            </div>
            <button type="submit" name="btn-login"
                class="text-center mt-2 py-3 bg-blue-600 text-white ring-2 rounded-lg w-[300px] hover:bg-slate-200 hover:ring-blue-600 hover:text-black">Register</button>
            <div class="mt-2 text-slate-600">
                <p>
                    Sudah punya akun?
                    <a href="{{ route('login') }}" class="text-blue-600">Login</a>
                </p>
            </div>
        </form>
    </div>
</div>