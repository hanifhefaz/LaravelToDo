<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show Task') }}
        </h2>
    </x-slot>
    <div class="container mx-auto">
        <div class="max-w-xl p-5 mx-auto my-10 bg-white rounded-md shadow-sm">
            <div class="text-center">
                <h1 class="my-3 text-3xl font-semibold text-gray-700">Current Task</h1>
                <p class="text-gray-400">Details of the task are written below.</p>
            </div>
            <div>
                <div class="mb-6">
                    <a class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md  focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300"
                        href="{{ route('tasks.index') }}"> Back</a>
                </div>
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                <strong>Title:</strong>
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                <strong>Description:</strong>
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                <strong>Status:</strong>
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                <strong>Category:</strong>
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                <strong>Assignee:</strong>
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <tr>
                                            <td scope="col" class="px-6 py-3 text-left text-xs tracking-wider">
                                                {{ $task->title }}</td>
                                            <td scope="col" class="px-6 py-3 text-left text-xs tracking-wider">
                                                {{ $task->description }}</td>
                                            <td scope="col" class="px-6 py-3 text-left text-xs tracking-wider">
                                                {{ $task->status }}</td>
                                            <td scope="col" class="px-6 py-3 text-left text-xs tracking-wider">
                                                {{ $task->relatedCategory->name }}</td>
                                            <td scope="col" class="px-6 py-3 text-left text-xs tracking-wider">
                                                {{ $task->relatedUser->name }}</td>
                                        </tr>

                                </table>

</x-app-layout>
