<div class="homehead">
  <a href="/" class="logo">CineMbs</a>
  <div class="header-right">
    <a href="/viewmore/released">Released Movies</a>
    <a href="/viewmore/upcoming">Upcoming Movies</a>
    <a href="/">Home</a>
    <a href="mailto: teamcldevloper@gmail.com">Contact</a>

    @auth
      @if(auth()->user()->user_role == "admin")
        <a href="/admin_index">Admin</a>
      @endif
      <a href="/logout">Logout</a>
    @else
      <a href="/register">Register</a>
      <a href="/login">Login</a>
      
    @endauth
  </div>
</div>