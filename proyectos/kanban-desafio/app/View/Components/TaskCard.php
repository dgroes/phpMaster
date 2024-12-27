<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TaskCard extends Component
{
    public $task;

    public function __construct($task)
    {
        $this->task = $task;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.task-card');
    }

    public function getPriorityClasses(): array
    {
        return match ($this->task->priority) {
            'low' => ['bgClass' => 'bg-violet-300', 'badgeClass' => 'badge-info'],
            'medium' => ['bgClass' => 'bg-teal-200', 'badgeClass' => 'badge-warning'],
            'high' => ['bgClass' => 'bg-indigo-300', 'badgeClass' => 'badge-error'],
            default => ['bgClass' => 'bg-default', 'badgeClass' => 'bg-default'],
        };
    }

}
