@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Listagem de Categorias</h3>
            {!! Button::primary('Nova Categoria')->asLinkTo(route('category.create')) !!}
        </div><br/>
        <div class="row">
            {!! Form::model([compact('search')], ['class' => 'form-inline', 'method' => 'GET']) !!}
            {!! Form::label('search', 'Pesquisa por Categoria:', ['class' => 'control-label']) !!}
            {!! Form::text('search', null, ['class' => 'form-control']) !!}

            {!! Button::primary('Buscar')->submit() !!}
            {!! Form::close() !!}
        </div><br/>
        <div class="row">

            {!!
                Table::withContents($categories->items())->condensed()->striped()->bordered()
                ->callback('Ações', function($field, $category) {
                $deleteForm = "delete-form-{$category->id}";
                $form = Form::open(['route' => ['categories.destroy', 'category' => $category->id], 'method' => 'DELETE',
                'id' => $deleteForm, 'style' => 'display:none']).
                Form::close();
                $anchorDestroy = Button::link('Excluir')
                    ->asLinkTo(route('categories.destroy', ['category' => $category->id]))
                    ->addAttributes(['onclick' => "event.preventDefault();document.getElementById(\"{$deleteForm}\").submit();"
                    ]);

                return "<ul class=\"list-inline\">".
                                "<li>".Button::link('Editar')->asLinkTo(route('categories.edit', ['category' => $category->id]))."</li>" .
                                "<li>|</li>".
                                "<li>".$anchorDestroy."</li>".
                           "</ul>".
                           $form;
                })

            !!}
            {{$categories->links()}}
        </div>
    </div>
@endsection