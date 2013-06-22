<!doctype html>
<html>

        <head>
                <link rel="stylesheet" type="text/css" href="/css/yarr.css">
        </head>

        <body>

                <div class="main_container">
                        <a style="float: right" href="/user/logout">Log out {{ $user->username }}</a>
                        <h1 class="feed_header">Manage your subscriptions</h1>

@if (count($user->subscriptions))
  <ul>@foreach ($user->subscriptions as $sub)
    <li>
      <a href="/subs/view/{{ $sub->id }}">{{ $sub->title }}</a>
      <a href="/subs/edit/{{ $sub->id }}">(edit)</a>
      <a href="/subs/delete/{{ $sub->id }}">(delete)</a>
    </li>
  @endforeach</ul>
  <p><a href="/subs/add">Add a subscription</a></p>
@else
  <p>You have no subs. <a href="/subs/add">Add one here</a>.</p>
@endif

</div></body></html>
