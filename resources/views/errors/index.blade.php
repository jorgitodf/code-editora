@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Página de Erro</h3>

        </div><br/>
        <div class="row alert alert-danger">
            {{ $message }}
        </div><br/>
        <div class="row">
            {!! Button::primary('Sair')->asLinkTo(route('books.index')) !!}
        </div>
    </div>
@endsection