<?php

namespace App\Livewire\Todos;

use Livewire\Component;

class TodoList extends Component
{
    public $todoList = [];

    public function mount($todoList = [], $search = [])
    {
        if (count($search) > 0) {
            $this->todoList = $search;
        } else {
            $this->todoList = $todoList;
        }
    }

    public function handleDelete($id)
    {
        $this->dispatch('deleted-todo', $id);
    }

    public function handleCompleted($id, $status)
    {
        $this->dispatch('completed-todo', compact('id', 'status'));
    }


    public function render()
    {
        return view('livewire.todos.todo-list');
    }
}