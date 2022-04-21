<?php

require_once "connect.php";
require_once "admin_middleware.php";
require_once "get_items_in_cart.php";

$connection = getConnection();

$user = $_SESSION['user'];

$sql = "SELECT id, address, user_id FROM addresses WHERE user_id = :id";
$query = $connection->prepare($sql);
$query->execute([
    "id" => $user['id']
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
    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <!-- jQuery -->
	<script src="https://code.jquery.com/jquery-3.6.0.js"
		integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- JavaScript Bundle with Popper -->
	<script src="https://unpkg.com/@popperjs/core@2"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
	</script>
</head>

<body>
	<?php require_once "navbar.php" ?>
    <div class="container">
        <h2 class="py-3">User Control Panel</h2>

        <h4>User data</h4>
        <form method="post" action="edit_user_in_database.php">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="name" class="form-control" id="name" name="name"
                    value="<?php echo $_SESSION['user']['name'] ?>">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email"
                    value="<?php echo $_SESSION['user']['email'] ?>">
            </div>

            <input name="id" type="hidden" value="<?php echo $user['id'] ?>">

            <button type="submit" class="btn btn-dark mb-4">Submit</button>
        </form>

        <h4>User addresses</h4>
        <form method="post" action="edit_address_in_database.php">
            <?php foreach ($addresses as $key => $address): ?>
            <div class="mb-3">
                <label for="address_<?php echo $key + 1 ?>" class="form-label">Address <?php echo $key + 1 ?></label>
                <input type="text" class="form-control" name="addresses[<?php echo $key + 1 ?>]"
                    value="<?php echo $address['address'] ?>">
            </div>
            <?php endforeach; ?>

            <button type="button" id="newAddressButton" class="btn btn-dark mb-3">Add new address</button>

            <div class="mb-3" id="newAddressField">
                <label for="address_<?php echo sizeof($addresses) + 1 ?>" class="form-label">Address
                    <?php echo sizeof($addresses) + 1 ?></label>
                <input type="text" class="form-control" name="addresses[<?php echo sizeof($addresses) + 1 ?>]">
            </div>

            <input name="id" type="hidden" value="<?php echo $user['id'] ?>">
            <button type="submit" class="btn btn-dark">Submit</button>
        </form>


    </div>
</body>

<script>
    $(document).ready(function () {
        $("#newAddressButton").click(function(){
            $("#newAddressField").toggle();
        });
    });
</script>

</html>