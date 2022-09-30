@extends('app.base')

@section('content')
<div>
    @if ($errors->any())
        <div class="alert alert-danger">
            The type has not been saved, please correct the errors.
        </div>
        @error('store')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    @endif
    <form action="{{ url('tipo') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="tipo">Type name</label>
            <input value="{{ old('tipo') }}" required type="text" minlength="2" maxlength="100" class="form-control" id="tipo" name="tipo" placeholder="Type name">
            @error('tipo')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="descripcion">Type description</label>
            <input value="{{ old('descripcion') }}" class="form-control" id="descripcion" name="descripcion" placeholder="Type description">
            @error('descripcion')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">add</button>
        &nbsp;
        <a href="{{ url('descripcion') }}" class="btn btn-primary">back</a>
    </form>
</div>
@endsection