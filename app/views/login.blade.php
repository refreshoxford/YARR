<!doctype html>
<html>

  <head>
    <link rel="stylesheet" type="text/css" href="/css/yarr.css">
  </head>

  <body>

    <div class="main_container">
    
      <div class="content_container" style="width:20%; margin: auto; padding: 0px 20px 0px 20px;">

        <h1>Login to YARR</h1>
        <hr>

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
          <p>{{ Form::submit('Log in') }} <a href="/user/register" >or Register</a></p>

        {{ Form::close() }}

      </div>

    </div>

  </body>
</html>

