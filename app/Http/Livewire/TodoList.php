<?php

namespace App\Http\Livewire;

use App\Models\TodoItem;
use Livewire\Component;

class TodoList extends Component
{
  public $todos;

  public string $todoTitle = '';

  public function render()
  {
    return view('livewire.todo-list');
  }

  public function mount(): void
  {
    $this->readTodos();
  }

  public function createTodo(): void
  {
    TodoItem::create([
      'title' => $this->todoTitle,
    ]);
    $this->todoTitle = '';
    $this->readTodos();
  }

  public function toggleTodo($id): void
  {
    $todoItem = TodoItem::findOrFail($id);
    $todoItem->completed = !$todoItem->completed;
    $todoItem->save();
    $this->readTodos();
  }

  public function deleteTodo($id): void
  {
    $todoItem = TodoItem::findOrFail($id);
    $todoItem->delete();
    $this->readTodos();
  }

  public function readTodos(): void
  {
    $this->todos = TodoItem::orderBy('created_at', 'desc')->get();
  }
}
