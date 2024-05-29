@extends('layouts.admin')

@section('content')
    <div class="col bg-success h-100 overflow-auto">
        <table class="table mt-3 ms-2 w-50 shadow">
            <thead>
              <tr>
                <th scope="col">Type</th>
                <th scope="col">Projects</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($types as $type)
                    <tr>
                        <td>{{ $type->name }}</td>
                        <td>
                            <ul class="list-group">
                                @foreach ($type->projects as $project)
                                <li class="list-group-item">
                                    <a href="{{ route('admin.projects.show', $project) }}">{{ $project->id }} - {{ $project->name }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
    </div>
@endsection
