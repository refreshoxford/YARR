Edit subscription {{ $feed->url }}
{{ Form::open(array(), array('method' => 'POST')) }}

  <!-- URL -->
  <p>{{ Form::label('title', 'Title') }}</p>
  <p>{{ Form::text('title', $sub->title) }}</p>

  <p>{{ Form::submit('Save changes') }} <a href="/subs" >Cancel</a></p>

{{ Form::close() }} 
