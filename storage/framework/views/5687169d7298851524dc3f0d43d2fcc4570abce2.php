<div class="homehead">
  <a href="/" class="logo">CineMbs</a>
  <div class="header-right">
    <a href="/viewmore/released">Released Movies</a>
    <a href="/viewmore/upcoming">Upcoming Movies</a>
    <a href="/">Home</a>
    <a href="mailto: teamcldevloper@gmail.com">Contact</a>

    <?php if(auth()->guard()->check()): ?>
      <?php if(auth()->user()->user_role == "admin"): ?>
        <a href="/admin_index">Admin</a>
      <?php endif; ?>
      <a href="/logout">Logout</a>
    <?php else: ?>
      <a href="/register">Register</a>
      <a href="/login">Login</a>
      
    <?php endif; ?>
  </div>
</div><?php /**PATH G:\cinembs\resources\views/components/header.blade.php ENDPATH**/ ?>