<div class="w-50 mx-auto py-3">
    <h2 class="text-center">Đăng nhập</h2>
    @if (session('msg'))
        <div class="alert alert-danger">{{ session('msg') }}</div>
    @endif
    <form wire:submit.prevent="handleLogin">
        <div class="mb-3">
            <label for="">Email</label>
            <input type="text" name="email" class="form-control" placeholder="Email..." wire:model="email"
                value="" />
            <span class="text-danger">
                @error('email')
                    {{ $message }}
                @enderror
            </span>
        </div>
        <div class="mb-3">
            <label for="">Mật khẩu</label>
            <input type="password" name="password" class="form-control" placeholder="Mật khẩu..."
                wire:model="password" />
            <span class="text-danger">
                @error('password')
                    {{ $message }}
                @enderror
            </span>
        </div>
        <div class="d-grid">
            <button class="btn btn-primary">Đăng nhập</button>
        </div>
        <livewire:auth.google-login />
        <livewire:auth.github-login />
        <hr>
        <p class="text-center"><a href="{{ route('auth.register') }}" wire:navigate>Đăng ký tài khoản</a></p>
        <p class="text-center"><a href="{{ route('auth.forgot-password') }}" wire:navigate>Quên mật khẩu</a></p>
    </form>
</div>