<div>
    <form wire:submit.prevent="addTask">
        <input type="text" wire:model="name" placeholder="Task name">
        @error('name') <span class="error">{{ $message }}</span> @enderror
        <button type="submit">Add Task</button>
    </form>

    <ul>
        @foreach($tasks as $task)
            <li>
                @if($editTaskId === $task->id)
                    <form wire:submit.prevent="updateTask">
                        <input type="text" wire:model="editTaskName">
                        @error('editTaskName') <span class="error">{{ $message }}</span> @enderror
                        <button type="submit">Update</button>
                        <button type="button" wire:click="$set('editTaskId', null)">Cancel</button>
                    </form>
                @else
                    {{ $task->name }}
                    <button wire:click="editTask({{ $task->id }})">Edit</button>
                    <button wire:click="deleteTask({{ $task->id }})">Delete</button>
                @endif
            </li>
        @endforeach
    </ul>
</div>
