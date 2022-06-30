{!! Form::model($model,
  ['url' => $form_url, 'method' => 'delete', 'class' => 'form-inline js-confirm', 'data-confirm' => $confirm_message] ) !!}
  <a href="{{ $download_url }}">Download</a> |
{!! Form::submit('Hapus', ['class'=>'btn btn-xs btn-danger']) !!}
{!! Form::close()!!}
