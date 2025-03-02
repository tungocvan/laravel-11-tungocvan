<div class="container">
    <h2 class="mb-3 text-center">Chuyển đổi tiền tệ</h2>
    <div class="row">
        <div class="col-6">
            <livewire:money-converter.vnd :vnd="$vnd" key="vnd-{{$key.$vnd}}" />
        </div>
        <div class="col-6">
            <livewire:money-converter.usd :usd="$usd" key="usd-{{$key.$usd}}" />
        </div>
    </div>
    <div class="mt-3 text-center">
        <button class="btn btn-danger" wire:click="handleReset">Xóa tất cả</button>
    </div>
</div> 