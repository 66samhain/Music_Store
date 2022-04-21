<?php

require_once "admin_middleware.php";
require_once "connect.php";
require_once "get_items_in_cart.php";
// require_once "get_items_in_cart.php";

// $cartStatus = getItemsInCart();

$connection = getConnection();

$records = $connection
	->query("SELECT id, artist, album_name, year, img_src, price FROM records")
	->fetchAll();

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
	<script src="https://unpkg.com/@popperjs/core@2"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
	</script>

</head>

<body>
	<?php require_once "navbar.php" ?>
	<div class="container text-center">
		<h1 class="my-3">Available Records</h1>

		<div class="row d-flex justify-content-center">

			<?php foreach ($records as $key => $record): ?>
			<div class="card col-md-4">
				<img src="<?php echo $record['img_src'] ?>" alt="" class="img-fluid py-3 w-75 mx-auto">
				<h5><?php echo $record['artist'] . " - " . $record['album_name'] ?></h5>
				<p><?php echo $record['year'] ?></p>
				<p><?php echo $record['price'] . " lei" ?></p>

				<form action="add_item_to_cart.php" method="post">
					<input name="album_id" type="hidden" value="<?php echo $record['id'] ?>">
					<button type="submit" class="btn btn-dark m-3 px-5">Add to cart</button>
				</form>
			</div>
			<?php endforeach; ?>

		</div>

	</div>
</body>

<script>
	var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
	var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
		return new bootstrap.Popover(popoverTriggerEl)
	})
</script>

</html>