@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Listagem de Papéis de Usuários</h3>
            {!! Button::primary('Novo Papel de Usuário')->asLinkTo(route('codeeduuser.roles.create')) !!}
        </div><br/>
        <div class="row">

            {!!
                Table::withContents($roles->items())->condensed()->striped()->bordered()
                ->callback('Ações', function($field, $role) {
                $deleteForm = "delete-form-{$role->id}";
                $form = Form::open(['route' => ['codeeduuser.roles.destroy', 'role' => $role->id], 'method' => 'DELETE',
                'id' => $deleteForm, 'style' => 'display:none']).
                Form::close();
                $anchorDestroy = Button::link('Excluir')
                    ->asLinkTo(route('codeeduuser.roles.destroy', ['role' => $role->id]))
                    ->addAttributes(['onclick' => "event.preventDefault();document.getElementById(\"{$deleteForm}\").submit();"
                    ]);
                return "<ul class=\"list-inline\">".
                                "<li>".Button::link('Editar')->asLinkTo(route('codeeduuser.roles.edit', ['role' => $role->id]))."</li>" .
                                "<li>|</li>".
                                "<li>".$anchorDestroy."</li>".
                           "</ul>".
                           $form;
                })

            !!}
            {{$roles->links()}}
        </div>
    </div>
@endsection