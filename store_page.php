<?php

require_once "connect.php";

$connection = getConnection();

$records = $connection
	->query("SELECT artist, album_name, year, img_src, price FROM records")
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
	<!-- jQuery -->
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
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
					<button type="button" class="btn btn-dark m-3">Add to cart</button>
				</div>
			<?php endforeach; ?>
		</div>

	</div>
</body>

</html>