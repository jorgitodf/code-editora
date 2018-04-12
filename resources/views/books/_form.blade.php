{!! Form::hidden('redirect_to', URL::previous()) !!}
{!! Html::openFormGroup('title', $errors) !!}
    {!! Form::label('title', 'Título', ['class' => 'control-label']) !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
    {!! Form::error('title', $errors) !!}
{!! Html::closeFormGroup() !!}

{!! Html::openFormGroup('subtitle', $errors) !!}
    {!! Form::label('subtitle', 'Sub-Título', ['class' => 'control-label']) !!}
    {!! Form::text('subtitle', null, ['class' => 'form-control']) !!}
    {!! Form::error('subtitle', $errors) !!}
{!! Html::closeFormGroup() !!}

{!! Html::openFormGroup('autor', $errors) !!}
{!! Form::label('autor', 'Autor', ['class' => 'control-label']) !!}
{!! Form::text('autor', null, ['class' => 'form-control']) !!}
{!! Form::error('autor', $errors) !!}
{!! Html::closeFormGroup() !!}

{!! Html::openFormGroup('price', $errors) !!}
    {!! Form::label('price', 'Preço', ['class' => 'control-label']) !!}
    {!! Form::text('price', null, ['class' => 'form-control']) !!}
    {!! Form::error('price', $errors) !!}
{!! Html::closeFormGroup() !!}