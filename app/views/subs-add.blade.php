<!doctype html>
<html>

        <head>
                <link rel="stylesheet" type="text/css" href="/css/yarr.css">
        </head>

        <body>

                <div class="main_container">
                        <a style="float: right" href="/subs">Back to subscriptions</a>
                        <h1 class="feed_header">Add subscription</h1>

{{ Form::open(array(), array('method' => 'POST')) }}

  <!-- URL -->
  <p>{{ Form::label('url', 'URL') }}</p>
  <p>{{ Form::text('url') }}</p>

  <p>{{ Form::submit('Subscribe') }}</p>

{{ Form::close() }}
</div></body></html>
