<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show Category') }}
        </h2>
    </x-slot>
    <div class="container mx-auto">
        <div class="max-w-xl p-5 mx-auto my-10 bg-white rounded-md shadow-sm">
          <div class="text-center">
            <h1 class="my-3 text-3xl font-semibold text-gray-700">Current Category</h1>
            <p class="text-gray-400">Details of the category are written below.</p>
          </div>
          <div>
            <div class="mb-6">
                <a class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md  focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300"
                href="{{ route('categories.index') }}"> Back</a>
              </div>

    <div class="mb-6">
                <strong>Name:</strong>
                {{ $category->name }}
        </div>
    </div>
</x-app-layout>
