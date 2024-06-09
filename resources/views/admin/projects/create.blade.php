@extends ('layouts.app')

@section('content')
<div class="container mt-4">
    <form>
        <div class="mb-3">
            <label for="name" class="form-label">Nome progetto</label>
            <input type="text" class="form-control" id="name" aria-describedby="emailHelp">
        </div>
        <div>
            <select class="mt-3"  name="" id="">
                <option value="" disabled selected >Tipo di Progetto</option>
                @foreach ( $types as $type)
                    <option value="">{{ $type->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3 mt-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>
@endsection