<div class="w-50 mx-auto py-3">
    <h2 class="text-center">Quên mật khẩu</h2>
    @if (session('msg'))
    <div class="alert alert-danger">{{session('msg')}}</div>
    @endif
    <form wire:submit.prevent="handleSendEmail">
        <div class="mb-3">
            <label for="">Email</label>
            <input type="text" name="email" class="form-control" placeholder="Email..." wire:model="email" value="" />
            <span class="text-danger">@error('email') {{ $message }} @enderror</span>
        </div>
        <button class="btn btn-primary">Gửi yêu cầu</button>
        <hr>
        <p class="text-center"><a href="{{route('auth.login')}}" wire:navigate>Đăng nhập</a></p>
    </form>
</div>