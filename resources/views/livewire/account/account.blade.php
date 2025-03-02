<div class="row">
    <div class="col-3">
        <ul class="nav nav-pills flex-column">
            <li class="nav-item"><a href="#" class="nav-link {{$tab=='account' ? 'active' : ''}}" wire:click.prevent="handleChangeTab('account')">Tài khoản</a></li>
            <li class="nav-item"><a href="#" class="nav-link {{$tab=='password' ? 'active' : ''}}" wire:click.prevent="handleChangeTab('password')">Mật khẩu</a></li>
        </ul>
    </div>
    <div class="col-9">
        @if ($tab=='account')
        <livewire:account.profile :user="$user" />
        @else
        <livewire:account.change-password />
        @endif
    </div>
</div>