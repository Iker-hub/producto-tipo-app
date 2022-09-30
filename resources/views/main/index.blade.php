@extends('app.base')

@section('content')
<div class="row">
    @if(session()->has('user'))
        <a href="{{ route('logout') }}" class="btn btn-success">logout</a>
    @else
        <a href="{{ action([App\Http\Controllers\MainController::class, 'login']) }}" class="btn btn-success">login</a>
    @endif
    &nbsp;
    <a href="{{ url('producto') }}" class="btn btn-success">products</a>
    &nbsp;
    @if(session()->has('user'))
        <a href="{{ url('tipo') }}" class="btn btn-success">types</a>
    @endif
</div>
@endsection