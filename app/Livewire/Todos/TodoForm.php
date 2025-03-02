<?php

namespace App\Livewire\Todos;

use Livewire\Component;

class TodoForm extends Component
{
    public $name = null;

    public function handleAdd()
    {
        $this->dispatch('created-todo', $this->name);
        $this->reset();
    }

    public function render()
    {
        return view('livewire.todos.todo-form');
    }
}