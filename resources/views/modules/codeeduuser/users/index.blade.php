@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Listagem de Usuários</h3>
            {!! Button::primary('Novo Usuário')->asLinkTo(route('codeeduuser.users.create')) !!}
        </div><br/>
        <div class="row">
            {!! Form::model([compact('search')], ['class' => 'form-inline', 'method' => 'GET']) !!}
            {!! Form::label('search', 'Pesquisa por Usuário:', ['class' => 'control-label']) !!}
            {!! Form::text('search', null, ['class' => 'form-control']) !!}

            {!! Button::primary('Buscar')->submit() !!}
            {!! Form::close() !!}
        </div><br/>
        <div class="row">

            {!!
                Table::withContents($users->items())->condensed()->striped()->bordered()
                ->callback('Ações', function($field, $user) {
                $deleteForm = "delete-form-{$user->id}";
                $form = Form::open(['route' => ['codeeduuser.users.destroy', 'user' => $user->id], 'method' => 'DELETE',
                'id' => $deleteForm, 'style' => 'display:none']).
                Form::close();
                $anchorDestroy = Button::link('Excluir')
                    ->asLinkTo(route('codeeduuser.users.destroy', ['user' => $user->id]))
                    ->addAttributes(['onclick' => "event.preventDefault();document.getElementById(\"{$deleteForm}\").submit();"
                    ]);
                //$anchorFlag = '<a href="#" title="Não é possível Excluir o próprio Usuário">Excluir</a>';

                if ($user->id == \Auth::user()->id) {
                    $anchorDestroy->disable();
                }
                return "<ul class=\"list-inline\">".
                                "<li>".Button::link('Editar')->asLinkTo(route('codeeduuser.users.edit', ['user' => $user->id]))."</li>" .
                                "<li>|</li>".
                                "<li>".$anchorDestroy."</li>".
                           "</ul>".
                           $form;
                })

            !!}
            {{$users->links()}}
        </div>
    </div>
@endsection