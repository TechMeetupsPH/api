<header>
  @if (Auth::check())
    @include('_nav_auth')
  @else
    @include('_nav_guest')
  @endif
</header>
