<div class="w-50 mx-auto py-3">
    <h2 class="text-center">Đăng ký</h2>
    @if (session('msg'))
    <div class="alert alert-danger">{{session('msg')}}</div>
    @endif
    <form wire:submit.prevent="handleRegister">
        <div class="mb-3">
            <label for="">Tên</label>
            <input type="text" name="name" class="form-control" placeholder="Tên..." wire:model="name" value="" />
            <span class="text-danger">@error('name') {{ $message }} @enderror</span>
        </div>
        <div class="mb-3">
            <label for="">Email</label>
            <input type="text" name="email" class="form-control" placeholder="Email..." wire:model="email" value="" />
            <span class="text-danger">@error('email') {{ $message }} @enderror</span>
        </div>
        <div class="mb-3">
            <label for="">Mật khẩu</label>
            <input type="password" name="password" class="form-control" placeholder="Mật khẩu..."
                wire:model="password" />
            <span class="text-danger">@error('password') {{ $message }} @enderror</span>
        </div>
        <div class="mb-3">
            <label for="">Nhập lại mật khẩu</label>
            <input type="password" name="confirm_password" class="form-control" placeholder="Nhập lại mật khẩu..."
                wire:model="confirm_password" />
            <span class="text-danger">@error('confirm_password') {{ $message }} @enderror</span>
        </div>
        <button class="btn btn-primary">Đăng ký</button>
        <hr>
        <p class="text-center"><a href="{{route('auth.login')}}" wire:navigate>Đăng nhập</a></p>
    </form>
</div>