Are you sure you want to delete?

{{ Form::open(array(), array('method' => 'POST')) }}

  <p>{{ Form::submit('Yes, delete!') }} <a href="/subs" >No, cancel</a></p>

{{ Form::close() }}
