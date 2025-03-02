<div class="todos">
    <div class="row justify-content-center">
        <div class="col-6">
            <h1>Todo App</h1>
            <livewire:todos.todo-filter />
            <livewire:todos.todo-list :todoList="$todoList" :search="$search" key="{{rand()}}" />
            <livewire:todos.todo-form />
            <div class="mt-3">
                <button class="btn btn-primary" wire:click="$dispatch('clear-todo')">Xóa tất cả</button>
            </div>
            @if ($msg)
            <p>{{$msg}}</p>
            @endif
        </div>
    </div>
</div>