<div class="max-w-xl mx-auto bg-white p-5 rounded-lg shadow">
    <form wire:submit.prevent="addTask" class="mb-4">
        <div class="flex">
            <input type="text" wire:model="name" placeholder="Task name"
                   class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
            @error('name') <span class="text-red-500 text-sm ml-2">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded-lg">Add Task</button>
    </form>

    <ul class="list-disc pl-5">
        @foreach($tasks as $task)
            <li class="flex items-center justify-between mb-2">
                @if($editTaskId === $task->id)
                    <form wire:submit.prevent="updateTask" class="flex-1">
                        <input type="text" wire:model="editTaskName"
                               class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                        @error('editTaskName') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        <div class="mt-2 flex">
                            <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-lg mr-2">Update</button>
                            <button type="button" wire:click="$set('editTaskId', null)" class="px-4 py-2 bg-gray-500 text-white rounded-lg">Cancel</button>
                        </div>
                    </form>
                @else
                    <span>{{ $task->name }}</span>
                    <div>
                        <button wire:click="editTask({{ $task->id }})" class="px-4 py-2 bg-yellow-500 text-white rounded-lg mr-2">Edit</button>
                        <button wire:click="deleteTask({{ $task->id }})" class="px-4 py-2 bg-red-500 text-white rounded-lg">Delete</button>
                    </div>
                @endif
            </li>
        @endforeach
    </ul>
</div>
