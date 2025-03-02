<div class="mb-3">
    <input type="search" placeholder="Tìm kiếm..." class="form-control" wire:keyup.enter="handleSearch($event.target.value)" wire:keydown.escape="$set('keyword', '')" wire:model="keyword">
</div>