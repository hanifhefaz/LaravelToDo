<x-app-layout>
    <x-slot name="header">
       <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Filter Tasks') }}
       </h2>
    </x-slot>

    <div class="container mx-auto">
        <div class="max-w-xl p-5 mx-auto my-10 bg-white rounded-md shadow-sm">
          <div class="text-center">
            <h1 class="my-3 text-3xl font-semibold text-gray-700">Filter Tasks</h1>
            <p class="text-gray-400">Filter the tasks according to your needs.</p>
          </div>
          <div>
            <form action="" method="post" id="filter_form">
                @csrf
              <div class="mb-6">
                <label class="block mb-2 text-sm text-gray-600">Start Date </label>
                <input type="date" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md  focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300" name="start_date"
                   value="{{ isset($request) ? $request->start_date : '' }}">
              </div>
              <div class="mb-6">
                <label class="block mb-2 text-sm text-gray-600">End Date </label>
                <input type="date" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md  focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300" name="start_date"
                   value="{{ isset($request) ? $request->start_date : '' }}">
              </div>
              <div class="mb-6">
                <label class="block mb-2 text-sm text-gray-600">Status </label>
                <select class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md  focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300" name="start_date" name="status">
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
                <button
                  type="submit"
                  class="w-full px-2 py-4 text-white bg-indigo-500 rounded-md  focus:bg-indigo-600 focus:outline-none"
                  onclick="submitForm('default')">
                  Filter Tasks
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
          @if (isset($data))
          <table class="table">
             <thead>
                <th>No</th>
                <th>Title</th>
                <th>Description </th>
                <th>Status</th>
                <th>Created_at</th>
             </thead>
             <tbody>
                @foreach ($data as $post)
                <tr>
                   <td>{{ $loop->iteration }}</td>
                   <td>{{ $post->title }}</td>
                   <td>{{ $post->description }}</td>
                   <td>{{ $post->status }}</td>
                   <td>{{ date('Y-m-d', strtotime($post->created_at)) }}</td>
                </tr>
                @endforeach
             </tbody>
          </table>
          @endif


    <script>
       function submitForm(form_type) {

           $('#filter_form').attr('action', "{{ route('filter_tasks') }}");
           $('#filter_form').submit();

       }
    </script>
 </x-app-layout>
