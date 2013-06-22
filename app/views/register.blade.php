<!doctype html>
<html>

  <head>
    <link rel="stylesheet" type="text/css" href="/css/yarr.css">
  </head>

  <body>

    <div class="main_container">
    
      <div class="content_container" style="width:20%; margin: auto; padding: 0px 20px 20px 20px;">

        <h1>Registration</h1>
        <hr>

        {{ Form::open(array(), array('method' => 'POST')) }}

          <!-- check for login errors flash var -->
          @if (Session::has('registration_errors'))
            <span class="error">Unable to register User.</span>
          @endif

          <!-- username field -->
          <span>{{ Form::label('username', 'Username') }}</span><br>
          <span>{{ Form::text('username') }}</span><br><br>

          <!-- email field -->
          <span>{{ Form::label('email', 'Email Address') }}</span><br>
          <span>{{ Form::text('email') }}</span><br><br>

          <!-- password field -->
          <span>{{ Form::label('password', 'Password') }}</span><br>
          <span>{{ Form::password('password') }}</span><br><br>

          <!-- confirm password -->
          <span>{{ Form::label('confirm', 'Confirm Password') }}</span><br>
          <span>{{ Form::password('confirm') }}</span><br><br>

          <!-- submit button -->
          <span>{{ Form::submit('Register') }}</span> <a href="/user/login" >or Log in</a><br>

        {{ Form::close() }}

      </div>

    </div>

  </body>
</html>


