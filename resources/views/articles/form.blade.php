<div class="form-group">
    {!! Form::label('category_id', 'Категория:') !!}
    {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group @if ($errors->has('name')) has-error @endif">
    {!! Form::label('name', 'Название:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
    @if ($errors->has('name')) <p class="help-block">{!! $errors->first('name') !!}</p> @endif
</div>

<div class="form-group @if ($errors->has('text')) has-error @endif">
    {!! Form::label('text', 'Текст:') !!}
    {!! Form::textarea('text', null, ['class' => 'form-control']) !!}
    @if ($errors->has('text')) <p class="help-block">{!! $errors->first('text') !!}</p> @endif
</div>

<div class="form-group">
    {!! Form::submit('Сохранить', ['class' => 'btn btn-primary submit-button']) !!}
</div>