<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Task') }}
        </h2>
    </x-slot>
    <div class="container mx-auto">
        <div class="max-w-xl p-5 mx-auto my-10 bg-white rounded-md shadow-sm">
            <div class="text-center">
                <h1 class="my-3 text-3xl font-semibold text-gray-700">Edit Task</h1>
                <p class="text-gray-400">Please update the task's information below.</p>
            </div>
            <div>
                <div class="mb-6">
                    <a class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md  focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300"
                        href="{{ route('tasks.index') }}"> Back</a>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-6">
                        <label class="block mb-2 text-sm text-gray-600">Title </label>
                        <input type="text" name="title" value="{{ $task->title }}"
                            class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md  focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300">
                    </div>

                    <div class="mb-6">
                        <label class="block mb-2 text-sm text-gray-600">Description </label>
                        <textarea
                            class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md  focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300"
                            name="description" placeholder="Description">{{ $task->description }}</textarea>
                    </div>



                    <div class="mb-6">
                        <label class="block mb-2 text-sm text-gray-600">Status </label>
                        <select
                            class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md  focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300"
                            name="status" name="status">
                            <option value="" selected> Status </option>
                            <option {{ $task->status == 'active' ? ' selected' : '' }} value="ACTIVE">
                                ACTIVE </option>
                            <option {{ $task->status == 'DONE' ? ' selected' : '' }} value="DONE">
                                DONE </option>
                            <<option {{ $task->status == 'PENDING' ? ' selected' : '' }} value="PENDING">
                                PENDING </option>
                        </select>
                    </div>

                    <div class="mb-6">
                        <label class="block mb-2 text-sm text-gray-600">Category </label>
                        <select
                            class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md  focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300"
                            name="category_id">
                            <option value="" selected disabled>{{ __('category') }}</option>
                            @foreach ($categories as $value)
                                <option {{ $task->category_id == $value->id ? 'selected' : '' }}
                                    value="{{ $value->id }}">
                                    {{ $value->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-6">
                        <label class="block mb-2 text-sm text-gray-600">Assignee </label>
                        <select
                            class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md  focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300"
                            name="assignee[]" multiple="multiple">
                            @foreach ($users as $value)
                                <option
                                    {{ in_array($value->id, $task->users->pluck('id')->toArray()) ? ' selected' : '' }}
                                    value="{{ $value->id }}">
                                    {{ $value->name }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="mb-6">
                        <button type="submit"
                            class="w-full px-2 py-4 text-white bg-indigo-500 rounded-md  focus:bg-indigo-600 focus:outline-none">
                            Update Task
                        </button>
                    </div>


                </form>
</x-app-layout>
