@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Listagem de Livros</h3>
            {!! Button::primary('Novo Livro')->asLinkTo(route('books.create')) !!}
        </div><br/>
        <div class="row">
            {!! Form::model([compact('search')], ['class' => 'form-inline', 'method' => 'GET']) !!}
                {!! Form::label('search', 'Pesquisa por Título:', ['class' => 'control-label']) !!}
                {!! Form::text('search', null, ['class' => 'form-control']) !!}

            {!! Button::primary('Buscar')->submit() !!}
            {!! Form::close() !!}
        </div><br/>
        <div class="row">

            {!!
                Table::withContents($books->items())->striped()->condensed()->bordered()
                ->callback('Ações', function($field, $book) {
                $deleteForm = "delete-form-{$book->id}";
                $form = Form::open(['route' => ['books.destroy', 'book' => $book->id], 'method' => 'DELETE',
                'id' => $deleteForm, 'style' => 'display:none']).
                Form::close();
                $anchorDestroy = Button::link('Ir para Lixeira')
                    ->asLinkTo(route('books.destroy', ['book' => $book->id]))
                    ->addAttributes(['onclick' => "event.preventDefault();document.getElementById(\"{$deleteForm}\").submit();"
                    ]);

                return "<ul class=\"list-inline\">".
                                "<li>".Button::link('Editar')->asLinkTo(route('books.edit', ['book' => $book->id]))."</li>" .
                                "<li>|</li>".
                                "<li>".$anchorDestroy."</li>".
                           "</ul>".
                           $form;
                })

            !!}
            {{$books->links()}}
        </div>
    </div>
@endsection