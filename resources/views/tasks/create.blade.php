<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Task') }}
        </h2>
    </x-slot>
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="col-lg-12 margin-tb">
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('tasks.index') }}"> Back</a>
                        </div>
                    </div>


                    @if ($errors->any())
                        <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('tasks.store') }}" method="POST" class="w-full max-w-sm">
                        @csrf
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="Title" class="block text-sm font-medium text-gray-700">Title</label>
                                        <input type="text" name="title" id="title" autocomplete="given-name"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>

                                    <div>
                                        <label for="description" class="block text-sm font-medium text-gray-700">
                                            Description
                                        </label>
                                        <div class="mt-1">
                                            <textarea id="description" name="description" rows="3"
                                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"
                                                placeholder="Description"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="status"
                                            class="block text-sm font-medium text-gray-700">Status:</label>
                                        <select name="status"
                                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            id="status">
                                            <option value="" selected disabled>{{ __('status') }}</option>

                                            <option
                                                {{ isset($request) ? ($request->status == $value->id ? 'selected' : '') : '' }}
                                                value="ACTIVE">
                                                ACTIVE</option>

                                            <option
                                                {{ isset($request) ? ($request->status == $value->id ? 'selected' : '') : '' }}
                                                value="DONE">
                                                DONE</option>

                                            <option
                                                {{ isset($request) ? ($request->status == $value->id ? 'selected' : '') : '' }}
                                                value="DELETED">
                                                DELETED</option>

                                        </select>
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="category"
                                            class="block text-sm font-medium text-gray-700">Category:</label>
                                        <select name="category"
                                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                            id="category">
                                            <option value="" selected disabled>{{ __('category') }}</option>
                                            @foreach ($categories as $value)
                                                <option
                                                    {{ isset($request) ? ($request->category == $value->id ? 'selected' : '') : '' }}
                                                    value="{{ $value->id }}">
                                                    {{ $value->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="Assignee"
                                            class="block text-sm font-medium text-gray-700">Assignee:</label>
                                        <select name="assignee"
                                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                            id="created_by">
                                            <option value="" selected disabled>{{ __('Assignee') }}</option>
                                            @foreach ($users as $value)
                                                <option
                                                    {{ isset($request) ? ($request->user == $value->id ? 'selected' : '') : '' }}
                                                    value="{{ $value->id }}">
                                                    {{ $value->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>


                                    <div class="form-check">
                                        <div class="form-group">
                                            <strong>Is Shown:</strong>
                                            <input
                                                class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                                type="checkbox" name="isShow" value="1">
                                        </div>
                                    </div>

                                    <button
                                        class="py-2 px-4 bg-green-500 text-white rounded-lg shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-75">
                                        Click me
                                    </button>

                                </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
