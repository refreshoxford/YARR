
{{ Form::open(array(), array('method' => 'POST')) }}

  <!-- check for login errors flash var -->
  @if (Session::has('registration_errors'))
    <span class="error">Unable to register User.</span>
  @endif

  <!-- username field -->
  <p>{{ Form::label('username', 'Username') }}</p>
  <p>{{ Form::text('username') }}</p>

  <!-- email field -->
  <p>{{ Form::label('email', 'Email Address') }}</p>
  <p>{{ Form::text('email') }}</p>

  <!-- password field -->
  <p>{{ Form::label('password', 'Password') }}</p>
  <p>{{ Form::password('password') }}</p>

  <!-- confirm password -->
  <p>{{ Form::label('confirm', 'Confirm Password') }}</p>
  <p>{{ Form::password('confirm') }}</p>

  <!-- submit button -->
  <p>{{ Form::submit('Register') }}</p>

{{ Form::close() }}
