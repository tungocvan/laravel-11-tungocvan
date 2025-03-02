<?php

namespace App\Livewire\Todos;

use Livewire\Component;
use Livewire\Attributes\On;

class Todos extends Component
{
    public $todoList = [];
    public $search = [];
    public $msg = null;

    #[On('created-todo')]
    public function createTodo($name)
    {
        if (!$name) {
            $this->msg = 'Vui lòng nhập tên';
            return;
        }
        $this->todoList[] = [
            'id' => uniqid(),
            'name' => $name,
            'completed' => false
        ];
        $this->msg = 'Thêm thành công';
    }

    #[On('deleted-todo')]
    public function deletedTodo($id)
    {
        $this->todoList = array_filter($this->todoList, function ($item) use ($id) {
            return $item['id'] != $id;
        });
        $this->msg = 'Xóa thành công';
    }

    #[On('completed-todo')]
    public function completedTodo($data)
    {
        extract($data);
        $this->todoList = array_map(function ($item) use ($status, $id) {
            if ($id == $item['id']) {
                $item['completed'] = $status;
            }
            return $item;
        }, $this->todoList);
        $this->msg = $status ? 'Đánh dấu thành công' : 'Bỏ đánh dấu thành công';
    }

    #[On('filter-todo')]
    public function filterTodo($keyword)
    {
        $this->search = array_filter($this->todoList, function ($item) use ($keyword) {
            if (strpos(mb_strtolower($item['name'], 'UTF-8'), mb_strtolower($keyword, 'UTF-8')) !== false) {
                return $item;
            }
        });
    }

    #[On('clear-todo')]
    public function clearTodos()
    {
        $this->todoList = [];
        $this->msg = 'Xóa tất cả thành công';
    }

    public function updated()
    {
        $this->msg = 'Xóa tất cả thành công';
    }

    public function render()
    {
        return view('livewire.todos.todos');
    }
}