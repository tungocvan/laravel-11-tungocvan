<?php

namespace App\Livewire\Todos;

use Livewire\Component;

class TodoFilter extends Component
{
    public $keyword = null;
    public function handleSearch($keyword = '')
    {
        $this->dispatch('filter-todo', $keyword);
    }

    public function updated()
    {
        $this->handleSearch(null);
    }

    /*
    public function resetFilter()
    {
        $this->keyword = '';
        $this->handleSearch(null);
    }
    */

    public function render()
    {
        return view('livewire.todos.todo-filter');
    }
}