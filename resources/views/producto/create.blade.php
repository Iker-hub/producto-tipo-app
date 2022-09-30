@extends('app.base')

@section('content')
<div>
    @if ($errors->any())
        <div class="alert alert-danger">
            The product has not been saved, please correct the errors.
        </div>
        @error('store')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    @endif
    <form action="{{ url('producto') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="nombre">Product name</label>
            <input value="{{ old('nombre') }}" required type="text" minlength="2" maxlength="100" class="form-control" id="nombre" name="nombre" placeholder="Product name">
            @error('nombre')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="precio">Product price</label>
            <input value="{{ old('precio') }}" required type="number" min="0" step="0.001" class="form-control" id="precio" name="precio" placeholder="Product price">
            @error('precio')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">add</button>
        &nbsp;
        <a href="{{ url('producto') }}" class="btn btn-primary">back</a>
    </form>
</div>
@endsection