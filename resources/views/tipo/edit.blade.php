@extends('app.base')

@section('content')
<div>
    @if ($errors->any())
        <div class="alert alert-danger">
            The type has not been saved, please correct the errors.
        </div>
        @error('update')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    @endif
    <form action="{{ url('tipo/' . $tipo->id) }}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="tipo">Type name</label>
            <input value="{{ old('tipo', $tipo->tipo) }}" required type="text" minlength="2" maxlength="100" class="form-control" id="tipo" name="tipo" placeholder="Type name">
            @error('tipo')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="descripcion">Type description</label>
            <input value="{{ old('descripcion', $tipo->descripcion) }}" class="form-control" id="descripcion" name="descripcion" placeholder="Type description">
            @error('descripcion')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">edit</button>
        &nbsp;
        <a href="{{ url('tipo') }}" class="btn btn-primary">back</a>
    </form>
</div>
@endsection