{{ $user->username }}: manage your subs

@if (count($user->subscriptions))
  <ul>@foreach ($user->subscriptions as $sub)
    <li>
      <a href="/subs/edit/{{ $sub->id }}">{{ $sub->title }}</a>
      <a href="/subs/delete/{{ $sub->id }}">(delete)</a>
    </li>
  @endforeach</ul>
  <p><a href="/subs/add">Add a sub</a></p>
@else
  <p>You have no subs. <a href="/subs/add">Add one here</a>.</p>
@endif
