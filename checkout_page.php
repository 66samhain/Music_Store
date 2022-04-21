<?php

require_once "admin_middleware.php";
require_once "connect.php";
require_once "get_items_in_cart.php";

$connection = getConnection();

$sql = "SELECT id, album_name, album_price FROM cart";
$query = $connection->prepare($sql);
$query-> execute();

$cart = $query->fetchAll();

$userId = $_SESSION['user']['id'];

$sql = "SELECT address FROM addresses WHERE user_id = :user_id";
$query = $connection->prepare($sql);
$query->execute([
    "user_id" => $userId
]);

$addresses = $query->fetchAll();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noisebleed Records</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

</head>

<body>
    <?php require_once "navbar.php" ?>

    <div class="container">

        <ol class="list-group list-group-numbered">
            <?php foreach ($cart as $key => $cartItem): ?>
            <li class="list-group-item"><?php echo $cartItem['album_name'] . " - " . $cartItem['album_price']?></li>
            <?php endforeach; ?>
        </ol>

        <form action="checkout.php" method="post">
            <?php foreach ($addresses as $key => $address): ?>
            <div class="form-check">
                <input required class="form-check-input" type="radio" name="address" value="<?php echo $address['address'] ?>" id="address_<?php echo $key + 1 ?>">
                <label class="form-check-label" for="address_<?php echo $key + 1 ?>">
                    <?php echo $address['address'] ?>
                </label>
            </div>
            <?php endforeach; ?>

            <input name="album_id" type="hidden" value="<?php echo $record['id'] ?>">
            <button type="submit" class="btn btn-dark m-3 px-5">Place order</button>
        </form>

    </div>

</body>

<script>
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
    var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl)
    })
</script>

</html>