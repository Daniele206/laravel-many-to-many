@extends('layouts.admin')

@section('content')
    <div class="col bg-success h-100 overflow-auto d-flex flex-nowrap">
        <div class="my-3 mx-2 p-3 w-75 bg-light shadow">
            <h1>{{ $project->name }}</h1>
            @if ($errors->any())
                <div class="alert alert-danger ms-2 mt-3" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>
                                {{$error}}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger ms-2 mt-3" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Titolo del progetto</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $project->name)}}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Tipo di progetto</label>
                        <select class="form-select" aria-label="Default select example" name="type_id">
                            <option selected value="{{ old('type_id', $project->type->id) }}">Type</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <label for="exampleInputPassword1" class="form-label">Tecnologie Usate</label>
                    <br>
                    <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                        @foreach ($technologies as $technology)
                            <input
                            name="technologies[]"
                            type="checkbox"
                            value="{{ $technology->id }}"
                            class="btn-check"
                            id="{{'btncheck' . $technology->id}}"
                            autocomplete="off"
                            @if($errors->any() && in_array($technology->id, old('technologies', [])) || !$errors->any() && $project->technologies->contains($technology))
                            checked
                            @endif
                            >
                            <label class="btn btn-outline-primary" for="{{'btncheck' . $technology->id}}" >{{$technology->name}}</label>
                        @endforeach
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Descrizione Progetto</label>
                        <textarea class="form-control" name="description">{{ old('description', $project->description)}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Copertina Progetto</label>
                        <input type="file" class="form-control" name="image">
                    </div>
                <button type="submit" class="btn btn-outline-success me-2">Submit</button>
                <a href="{{ route('admin.projects.index') }}" type="submit" class="btn btn-outline-danger">Back</a>
            </form>
        </div>
    </div>
@endsection
