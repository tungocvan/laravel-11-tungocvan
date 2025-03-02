<ul class="todo-list m-0">
    @foreach ($todoList as $item)
    <li wrie:key="{{$item['id']}}">
        <input type="checkbox" wire:change="handleCompleted('{{$item['id']}}', $event.target.checked)"
            {{$item['completed'] ? 'checked': ''}}>
        <span class="{{$item['completed'] ? 'completed': ''}}">{{$item['name']}}</span>
        <button wire:confirm="Are you sure you want to delete this todo?"
            wire:click="handleDelete('{{$item['id']}}')">&times;</button>
    </li>
    @endforeach
</ul>