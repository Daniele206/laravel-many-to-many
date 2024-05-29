@extends('layouts.admin')

@section('content')
        <div class="col bg-success h-100 overflow-auto d-flex flex-nowrap">
            <div class="left_box w-50">
                @if ($errors->any())
                <div class="alert alert-danger ms-2 mt-3 w-98" role="alert">
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
                    <div class="alert alert-danger ms-2 mt-3 w-98" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success ms-2 mt-3 w-98" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="mt-3 ms-2 p-3 w-98 bg-light shadow">
                    <h2>Aggiungi Project <a href="{{ route('admin.projects.create') }}" class="fa-solid fa-plus text-decoration-none"></a></h2>
                </div>
                <table class="table mt-3 ms-2 w-98 shadow">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Type</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                            <tr>
                                <th scope="row">{{ $project->name }}</th>
                                <td>
                                    @if (isset($project->type->name))
                                        {{ $project->type->name }}
                                    @else
                                        ---
                                    @endif
                                </td>
                                <td class="d-flex justify-content-end">
                                    <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-success mx-1"><i class="fa-solid fa-eye"></i></a>
                                    <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-warning mx-1"><i class="fa-solid fa-pen"></i></a>
                                    <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" onsubmit="return confirm('Sicuro di voler eliminare il progetto {{ $project->name }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger mx-1" href="#"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="rigth-box w-50">
                <div id="carouselExampleAutoplaying" class="carousel slide mt-3 ms-3 w-98" data-bs-ride="carousel">
                    <div class="carousel-inner" style="height: 450px">
                        <div class="carousel-item active bg-black w-100 h-100">
                            <img src="https://www.musaformazione.it/wp-content/uploads/2021/08/introduzione-HTML.jpg" class="d-block w-100 h-100 opacity-50" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h4 class="fw-bold">BoolFolio</h4>
                                <p class="fs-5">I miei progetti</p>
                            </div>
                        </div>
                        @foreach ($projects as $project)
                            @if (isset($project->image))
                                <div class="carousel-item bg-black w-100 h-100">
                                    <img class="d-block w-100 h-100 opacity-50 ratio-16x9" src="{{ asset('storage/'. $project->image) }}" alt="{{ $project->image }}">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h4 class="fw-bold"><a class="text-light" href="{{ route('admin.projects.show', $project) }}">{{  $project->name }}</a></h4>
                                        <p class="fs-5">{{  $project->type->name }}</p>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
@endsection
