@extends ('layouts.app')

@section('content')
<section>
    <div class="container mt-4 d-flex justify-content-end">
        <a class="btn btn-success" href="{{ route('admin.projects.create') }}">Crea un nuovo progetto</a>
    </div>
    <div class="container mt-4">
        <table class="table">
            <thead>
                <tr class="text-center">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Slug</th>
                    <th>Date</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                <tr class="text-center">
                    <th>{{ $project->id }}</th>
                    <td><a href="{{ route('admin.projects.show', $project) }}">{{ $project->name }}</a></td>
                    <td>{{$project->type ? $project->type->name : ''}}</td>
                    <td>{{ $project->slug }}</td>
                    <td>{{ $project->date }}</td>
                    <td><a class="btn btn-primary" href="">EDIT</a></td>
                    <td>
                        @auth
                        <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger">DELETE</button>

                        </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection