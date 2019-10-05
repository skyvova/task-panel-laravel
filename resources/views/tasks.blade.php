@extends('layouts.app')
@section('content')
<div class="card-body">
    @include('errors')


    <form action="{{ url('task') }}" method="post" class="form-horizontal">
        {{ csrf_field() }}

        <div class="row">
            <div class="form-froup">
                <label for="Task" class="col-sm-3 control-label">Task</label>

                <div class="row">
                    <div class="col-sm-6">
                        <input type="text" name="name" id="task-name" class="form-control">
                    </div>
                    <div class="col-sm-6">
                        <input type="submit" name="button" id="submit" class="btn btn-success" value="Add task">
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>

@if(count($tasks) > 0)
    <div class="card">
        <div class="card-heading col">
            <h2>Current tasks</h2>
        </div>
        <div class="card-body">
            <table class="table table-striped task-table">
                <thead>
                    <th>Task</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                        <tr>
                            <td class="table-text">
                                <div>{{ $task->name }}</div>
                            </td>
                            <td>
                                <form action="{{ url('task',$task->id) }}" method="post">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}

                                    <button class="btn btn-danger">
                                        Delete
                                    </button>

                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endif
@endsection