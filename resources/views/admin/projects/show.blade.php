@extends('layouts.admin')

@section('content')

    <div class="col bg-success h-100 overflow-auto d-flex flex-nowrap">
        <div class="my-3 mx-2 p-3 w-100 bg-light shadow">
            <h1>{{$project->name}}</h1>
            <h3>{{$project->type->name}}</h3>
            <p>{{$project->description}}</p>
            @if (isset($project->image))
                <img style="max-width: 500px" src="{{ asset('storage/'. $project->image) }}" alt="{{$project->name}}">
            @endif
            <br>
            <a class="btn btn-danger mt-4" href="{{ route('admin.projects.index') }}">Back</a>
        </div>
    </div>

@endsection
