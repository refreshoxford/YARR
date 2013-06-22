{{ $user->username }}: manage your subs

@if (count($user->subscriptions))
  <ul>@foreach ($user->subscriptions as $sub)
    <li>{{ $sub->title }}</li>
  @endforeach</ul>
  <p><a href="/subs/add">Add a sub</a></p>
@else
  <p>You have no subs. <a href="/subs/add">Add one here</a>.</p>
@endif
