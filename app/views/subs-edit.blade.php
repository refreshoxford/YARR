<!doctype html>
<html>

        <head>
                <link rel="stylesheet" type="text/css" href="/css/yarr.css">
        </head>

        <body>

                <div class="main_container">
                        <a style="float: right" href="/subs">Back to subscriptions</a>
                        <h1 class="feed_header">Edit subscription</h1>


URL: {{ $feed->url }}
{{ Form::open(array(), array('method' => 'POST')) }}

  <p>{{ Form::label('title', 'Title') }}</p>
  <p>{{ Form::text('title', $sub->title) }}</p>

  <p>{{ Form::submit('Save changes') }} <a href="/subs" >Cancel</a></p>

{{ Form::close() }} 
