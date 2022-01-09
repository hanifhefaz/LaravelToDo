@extends('layouts.layout')
@section('content')

<section class="content">
        <form action="" method="post" id="filter_form">
            @csrf

            <div class="row form-group">
                <div class="col-md-2 form-group">
                    <label class="control-label">Start Date </label>
                    <input type="date" class="form-control" name="start_date"
                        value="{{ isset($request) ? $request->start_date : '' }}">
                </div>
                <div class="col-md-2 form-group">
                    <label class="control-label">End Date </label>
                    <input type="date" class="form-control" name="end_date"
                        value="{{ isset($request) ? $request->end_date : '' }}">
                </div>
                <div class="col-md-2 form-group">
                    <label class="control-label">Status </label>
                    <select class="form-control" name="status">
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
            </div>

            <div class="row form-group">
                <div class="col text-center">
                    <button type="button" class="btn btn-primary" onclick="submitForm('default')"><i
                            class="fa fa-bar-chart"></i>
                        Filter</button>
                </div>
            </div>

        </form>


</section>

<section class=" content">
    <div class="row">

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
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>

@stop

<script>
     function submitForm(form_type) {

                $('#filter_form').attr('action', "{{ route('filter_tasks') }}");
                $('#filter_form').submit();

        }
</script>

