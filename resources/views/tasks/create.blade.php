<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Task') }}
        </h2>
    </x-slot>

    <div class="container mx-auto">
        <div class="max-w-xl p-5 mx-auto my-10 bg-white rounded-md shadow-sm">
          <div class="text-center">
            <h1 class="my-3 text-3xl font-semibold text-gray-700">Add New Task</h1>
            <p class="text-gray-400">Please fill the form below to add a new task.</p>
          </div>
          <div>
            <div class="mb-6">
                <a class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md  focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300"
                href="{{ route('tasks.index') }}"> Back</a>
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

                    <form action="{{ route('tasks.store') }}" method="POST">
                        @csrf
                        <div class="mb-6">
                            <label class="block mb-2 text-sm text-gray-600">Title </label>
                            <input type="text" name="title" id="title" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md  focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300">
                          </div>

                          <div class="mb-6">
                            <label for="message" class="block mb-2 text-sm text-gray-600"
                              >Description</label
                            >
                            <textarea
                              rows="5"
                              id="description"
                              name="description"
                              placeholder="Description of the task"
                              class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md  focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300"
                              required
                            ></textarea>
                          </div>
                          <div class="mb-6">
                            <label class="block mb-2 text-sm text-gray-600">Status </label>
                            <select class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md  focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300" name="status">
                                <option value="" selected> Status </option>
                                <option {{ isset($request) ? ($request->status == 'ACTIVE' ? 'selected' : '') : '' }}
                                value="ACTIVE">
                                ACTIVE </option>
                                <option {{ isset($request) ? ($request->status == 'DONE' ? 'selected' : '') : '' }}
                                value="DONE">
                                DONE </option>
                                <<option {{ isset($request) ? ($request->status == 'DELETED' ? 'selected' : '') : '' }}
                                value="DELETED">
                                DELETED </option>
                             </select>
                          </div>

                          <div class="mb-6">
                            <label class="block mb-2 text-sm text-gray-600">Category </label>
                            <select class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md  focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300" name="category_id">
                                <option value="" selected disabled>{{ __('category') }}</option>
                                            @foreach ($categories as $value)
                                                <option
                                                    {{ isset($request) ? ($request->category == $value->id ? 'selected' : '') : '' }}
                                                    value="{{ $value->id }}">
                                                    {{ $value->name }}</option>
                                            @endforeach
                             </select>
                          </div>

                          <div class="mb-6">
                            <label class="block mb-2 text-sm text-gray-600">Assignee </label>
                            <select class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md  focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300" name="assignee">
                                <option value="" selected disabled>{{ __('Assignee') }}</option>
                                            @foreach ($users as $value)
                                                <option
                                                    {{ isset($request) ? ($request->user == $value->id ? 'selected' : '') : '' }}
                                                    value="{{ $value->id }}">
                                                    {{ $value->name }}</option>
                                            @endforeach
                             </select>
                          </div>



                                    <div class="mb-6">

                                            <strong>Is Shown:</strong>
                                            <input
                                                class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                                type="checkbox" name="isShow" value="1">

                                    </div>

                                    <div class="mb-6">
                                        <button
                                          type="submit"
                                          class="w-full px-2 py-4 text-white bg-indigo-500 rounded-md  focus:bg-indigo-600 focus:outline-none"
                                          onclick="submitForm('default')">
                                          Add Task
                                        </button>
                                      </div>
                                </div>
                    </form>
                </div>


</x-app-layout>
