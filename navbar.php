<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php">Manage</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="store_page.php">Store Page</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">My Account</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">My Orders</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<script>
    $( document ).ready(function() {
        $('a').each(function() {
            if ($(this).prop('href') == window.location.href) {
                $(this).addClass("active");
            }
        });
    });
</script>