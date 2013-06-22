{{ Form::open(array(), array('method' => 'POST')) }}

  <!-- URL -->
  <p>{{ Form::label('url', 'URL') }}</p>
  <p>{{ Form::text('url') }}</p>

  <p>{{ Form::submit('Subscribe') }}</p>

{{ Form::close() }}
