@extends('app.base')

@section('content')
<div>
    <div class="row" style="margin-top: 8px;">
        Type id#: {{ $tipo->id }}
    </div>
    <div class="row" style="margin-top: 8px;">
        Type name: {{ $tipo->nombre}}
    </div>
    <div class="row" style="margin-top: 8px;">
        Type description: {{ $tipo->description }}
    </div>
    <div class="row" style="margin-top: 8px;">
        <a href="{{ url()->previous() }}" class="btn btn-primary">back</a>
    </div>
</div>
@endsection