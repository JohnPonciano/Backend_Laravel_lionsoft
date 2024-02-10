@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Dashboard') }} -
                </div>
                <h5 class="card-header">
                    <a href="{{ route('todo.create') }}" class="btn btn-sm btn-outline-primary">Add Item</a>
                </h5>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session()->get('success') }}
                        </div>
                    @endif

                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Created In</th>
                                <th scope="col">Updated In</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($todos as $todo)
                                <tr>
                                    <td>
                                        @if ($todo->completed)
                                            <a href="{{ route('todo.edit', $todo->id) }}" style="color: black"><s>{{ $todo->title }}</s></a>
                                        @else
                                            <a href="{{ route('todo.edit', $todo->id) }}" style="color: black">{{ $todo->title }}</a>
                                        @endif
                                    </td>
                                    <td>{{ $todo->created_at->format('d-m-y H:i') }}</td>
                                    <td>{{ $todo->updated_at->format('d-m-y H:i') }}</td>
                                    <td>
                                        <a href="{{ route('todo.edit', $todo->id) }}" class="btn btn-sm btn-outline-success"><i class="fa fa-pencil-square-o"></i></a>
                                        <a href="{{ route('todo.show', $todo->id) }}" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">No task here!... is vacation?</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <h1>Token gerado</h1>
                    {{-- <p> {{ dd(Auth::user()) }}</p> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection