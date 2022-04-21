<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index.php">Manage</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="store_page.php">Store Page</a>
                </li>
            </ul>

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" tabindex="0" role="button" data-toggle="popover" data-bs-trigger="focus"
                        ><i class="bi bi-cart2"></i></a>
                </li>
                <?php if ($_SESSION['user_is_logged_in']): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="user_page.php"><?php echo $_SESSION['user']['name'] ?></a>
                    </li>
                <?php endif; ?>
                <li class="nav-item">
                    <a class="nav-link" href="#">My Orders</a>
                </li>
                <li class="nav-item">
                    <?php if ($_SESSION['user_is_logged_in']): ?>
                    <a class="nav-link" href="logout.php">Logout</a>
                    <?php else:?>
                    <a class="nav-link" href="login_page.php">Login</a>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script>
    $(document).ready(function () {
        $('a').each(function () {
            if ($(this).prop('href') == window.location.href) {
                $(this).addClass("active");
            }
        });

        $('[data-toggle="popover"]').popover({
            placement: 'top',
            html: true,
            title: 'No items',
            content: '<p><?php getItemsInCart() ?></p><a href="<?php if (checkItemsInCart()): echo "checkout_page.php" ?> <?php endif; ?>" class="btn btn-success"><?php if (checkItemsInCart()): ?> Checkout <?php else: ?> Ok <?php endif; ?></a>'
        });
        $(document).on("click", ".popover .close", function () {
            $(this).parents(".popover").popover('hide');
        });
    });
</script>