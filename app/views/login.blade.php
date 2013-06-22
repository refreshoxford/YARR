<!doctype html>
<html>

  <head>
    <link rel="stylesheet" type="text/css" href="/css/yarr.css">
  </head>

  <body>

    <div class="main_container">
    
      <div class="content_container">

        {{ Form::open(array(), array('method' => 'POST')) }}

          <!-- check for login errors flash var -->
          @if (Session::has('login_errors'))
            <span class="error">Username or password incorrect.</span>
          @endif

          <!-- username field -->
          <p>{{ Form::label('username', 'Username') }}</p>
          <p>{{ Form::text('username') }}</p>

          <!-- password field -->
          <p>{{ Form::label('password', 'Password') }}</p>
          <p>{{ Form::password('password') }}</p>

          <!-- submit button -->
          <p>{{ Form::submit('Login') }}</p>

        {{ Form::close() }}

      </div>

    </div>

  </body>
</html>

