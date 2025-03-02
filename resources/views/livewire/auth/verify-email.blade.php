<div class="w-50 mx-auto py-3 text-center">
    <h2>Kích hoạt tài khoản</h2>
    <p>
        Vui lòng kiểm tra email kích hoạt tài khoản để tiếp tục sử dụng
    </p>
    <div>
        <button class="btn btn-primary" wire:click="handleResendEmail" wire:loading.class="disabled">Gửi lại email kích
            hoạt</button>
    </div>
    <p wire:loading>Đang gửi lại email. Vui lòng đợi</p>
    @if ($msg)
    <div class="alert alert-success my-2">{{$msg}}</div>
    @endif
</div>