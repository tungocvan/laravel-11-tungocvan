<ul class="nav flex-column">
    <li class="nav-item"><a class="nav-link" href="/" wire:navigate>Trang chủ</a></li>
    <li class="nav-item"><span class="nav-link">Chào bạn: {{auth()->user()->name}}</span></li>
    <li class="nav-item"><a class="nav-link" href="{{route('account')}}" wire:navigate>Tài khoản</a></li>
    <li class="nav-item">
        <livewire:auth.logout />
    </li>
</ul>