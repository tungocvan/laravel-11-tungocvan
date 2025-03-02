<div>
    <h2>Tài khoản</h2>
    <table class="table table-bordered">
        <tr>
            <th width="30%">Tên</th>
            <td>
                @if ($field == 'name')
                <input type="text" class="form-control" placeholder="Tên..." wire:model="name" wire:keyup.enter="handleSave('name')" />
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
                @else
                {{$name}}
                @endif
            </td>
            <td width="10%" class="text-center">
                @if ($field == 'name')
                <button class="btn btn-primary btn-sm" wire:click="handleSave('name')">Lưu</button>
                @else
                <button class="btn btn-warning btn-sm" wire:click="handleShowField('name')">Sửa</button>
                @endif
            </td>
        </tr>
        <tr>
            <th>Email</th>
            <td>
                @if ($field == 'email')
                <input type="email" class="form-control" placeholder="Email..." wire:model="email" wire:keyup.enter="handleSave('email')" />
                @error('email')
                <span class="text-danger">{{$message}}</span>
                @enderror
                @else
                {{$email}}
                @endif
            </td>
            <td class="text-center">
                @if ($field == 'email')
                <button class="btn btn-primary btn-sm" wire:click="handleSave('email')">Lưu</button>
                @else
                <button class="btn btn-warning btn-sm" wire:click="handleShowField('email')">Sửa</button>
                @endif
            </td>
        </tr>
        <tr>
            <th>Thời gian đăng ký</th>
            <td>{{$createdAt}}</td>
            <td></td>
        </tr>
        <tr>
            <th>Thời gian kích hoạt</th>
            <td>{{$emailVerifiedAt}}</td>
            <td></td>
        </tr>
        <tr>
            <th>Cập nhật lần cuối</th>
            <td>{{$updatedAt}}</td>
            <td></td>
        </tr>
    </table>
</div>