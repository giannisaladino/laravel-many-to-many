@extends ('layouts.app')

@section('content')
<div class="container text-center mt-5">
    <h3>{{ $project->name }}</h3>
    <h4>Type: {{ $project->type->name }}</h4>
    <h5>Data di creazione: {{ $project->date }}</h5>
    <a href="{{ route('admin.projects.index') }}" class="btn btn-info" >BACK</a>
</div>
@endsection