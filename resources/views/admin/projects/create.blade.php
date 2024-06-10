@extends ('layouts.app')

@section('content')
<div class="container mt-4">
    <form action="{{ route('admin.projects.store') }}" method="POST">

        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nome progetto</label>
            <input type="text" class="form-control" id="name" aria-describedby="emailHelp">
        </div>

        <div>
            <select class="mt-3" name="type_id" id="type">
                <option value="" disabled selected>Tipo di Progetto</option>
                @foreach ($types as $type)
                    <option value="">{{ $type->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mt-3">
            <h4>Seleziona le tecnologie</h4>
            <div class="d-flex gap-3">
            @foreach ($tecnologies as $tecnology)
                <div class="form-check">
                    <input name="tecnologies" class="form-check-input" type="checkbox" value="{{ $tecnology->id }}" id="tag-{{ $tecnology->id }}">
                    <label class="form-check-label" for="tag_{{ $tecnology->id }}">
                        {{$tecnology->name}}
                    </label>
                </div>
            @endforeach

            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-info">BACK</a>
    </form>

</div>
@endsection