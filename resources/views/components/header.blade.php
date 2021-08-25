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
    <a href="/mybookings">My Bookings</a>




    <a  data-toggle="dropdown" class="dropdown-toggle" href="#">
      <span class="username">{{ ucwords(auth()->user()->name) }}</span>
      <b class="caret"></b>
    </a>
    <ul class="dropdown-menu extended logout pull-right" style="margin-top: 15px;;" >
      <div class="log-arrow-up"></div>
      <li class="eborder-top">
        <a href="/viewprofile"><i class="icon_profile"></i> My Profile</a>
      </li>
      <li>
        <a href="/logout"><i class="icon_key_alt"></i>Log Out</a>
      </li>
    </ul>


    @else
    <a href="/register">Register</a>
    <a href="/login">Login</a>

    @endauth
  </div>
</div>