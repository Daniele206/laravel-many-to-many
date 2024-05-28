@extends('layouts.admin')

@section('content')

    <div class="col bg-success h-100 overflow-auto d-flex flex-nowrap">
        <div class="my-3 mx-2 p-3 w-100 bg-light shadow">
            <h1 class="fw-bold">Titolo</h1>
            <h3>{{$project->name}}</h3>

            @if (isset($project->type->name))
                <h2 class="fw-bold">Tipologgia</h2>
                <h4>{{$project->type->name}}</h4>
            @endif

            @if (isset($project->description))
                <h2 class="fw-bold">Descrizzione</h2>
                <p class="fs-5">{{$project->description}}</p>
            @endif

            @if (isset($project->technologies))
                <h2 class="fw-bold">Tecnologie Usate</h2>
                <ul class="list-unstyled d-flex fs-5">
                    @foreach ($project->technologies as $tecnology)
                        <li class="mx-1">|</li>
                        <li>{{$tecnology->name}}</li>
                    @endforeach
                    <li class="mx-1">|</li>
                </ul>
            @endif

            @if (isset($project->image))
                <img style="max-width: 500px" src="{{ asset('storage/'. $project->image) }}" alt="{{$project->name}}">
            @endif
            <br>
            <a class="btn btn-danger mt-4" href="{{ route('admin.projects.index') }}">Back</a>
        </div>
    </div>

@endsection
