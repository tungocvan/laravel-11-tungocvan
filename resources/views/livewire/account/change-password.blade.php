<div>
    <h2>Đổi mật khẩu</h2>
    @if (session('msg'))
    <div class="alert alert-success">{{session('msg')}}</div>
    @endif
    <form action="" wire:submit.prevent="handleUpdatePassword">
        <div class="mb-3">
            <label for="">Mật khẩu cũ</label>
            <input type="password" name="old_password" class="form-control" placeholder="Mật khẩu cũ..." wire:model="old_password" />
            <span class="text-danger">@error('old_password') {{ $message }} @enderror</span>
        </div>
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
        <button class="btn btn-primary">Đổi mật khẩu</button>
    </form>
</div>