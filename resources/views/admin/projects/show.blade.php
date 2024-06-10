@extends ('layouts.app')

@section('content')
<div class="container text-center mt-5">
    <h3>{{ $project->name }}</h3>
    <h4>Type: {{ $project->type ? $project->type->name : '' }}</h4>
    <!-- <h5>Data di creazione: {{ $project->date }}</h5> -->
    <ul class="d-flex justify-content-center gap-2 list-unstyled">
        <!-- @dump($project->tecnologies()) -->
        <h5>Tecnologie utilizzate:</h5>
        @foreach ( $project->tecnologies as $tecnology  )
            <li><h5>{{ $tecnology->name}}</h5></li>
        @endforeach
    </ul>
    <a href="{{ route('admin.projects.index') }}" class="btn btn-info" >BACK</a>
</div>
@endsection