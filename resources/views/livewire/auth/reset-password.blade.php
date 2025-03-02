<div class="w-50 mx-auto py-3">
    <h2 class="text-center">Đặt lại mật khẩu</h2>
    @if (session('msg'))
    <div class="alert alert-danger">{{session('msg')}}</div>
    @endif
    <form wire:submit.prevent="handleUpdatePassword">
        <div class="mb-3">
            <label for="">Mật khẩu</label>
            <input type="password" name="password" class="form-control" placeholder="Mật khẩu..." wire:model="password" />
            <span class="text-danger">@error('password') {{ $message }} @enderror</span>
        </div>
        <div class="mb-3">
            <label for="">Nhập lại mật khẩu</label>
            <input type="password" name="confirm_password" class="form-control" placeholder="Nhập lại mật khẩu..." wire:model="confirm_password" />
            <span class="text-danger">@error('confirm_password') {{ $message }} @enderror</span>
        </div>
        <button class="btn btn-primary">Cập nhật</button>
        <hr>
        <p class="text-center"><a href="{{route('auth.login')}}" wire:navigate>Đăng nhập</a></p>
    </form>
</div>