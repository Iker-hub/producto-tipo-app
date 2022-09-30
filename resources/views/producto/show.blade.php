@extends('app.base')

@section('content')
<div>
    <div class="row" style="margin-top: 8px;">
        Product id#: {{ $producto->id }}
    </div>
    <div class="row" style="margin-top: 8px;">
        Product name: {{ $producto->nombre}}
    </div>
    <div class="row" style="margin-top: 8px;">
        Product price: {{ $producto->precio }}
    </div>
    <div class="row" style="margin-top: 8px;">
        <a href="{{ url()->previous() }}" class="btn btn-primary">back</a>
    </div>
</div>
@endsection