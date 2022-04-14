<?php

	require_once "connect.php";

	$connection = getConnection();

	$records = $connection
		->query("SELECT id, artist, album_name, year, img_src, stock, price FROM records")
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
	<div class="container">
		<h2 class="my-3">Manage Records</h2>

		<a href="add_record_page.php" class="btn btn-dark mb-3">Add new record</a>

		<table class="table">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Artist</th>
					<th scope="col">Album Name</th>
					<th scope="col">Year</th>
					<th scope="col">Image</th>
					<th scope="col">Stock</th>
					<th scope="col">Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($records as $key => $record): ?>
					<tr>
						<th scope="row"><?php echo $record['id'] ?></th>
						<td><?php echo $record['artist'] ?></td>
						<td><?php echo $record['album_name'] ?></td>
						<td><?php echo $record['year'] ?></td>
						<td><a href="<?php echo $record['img_src'] ?>" target="_blank"><?php echo $record['album_name'] ?></a></td>
						<td><?php echo $record['stock'] ?></td>
						<td>
							<a href="edit_record_page.php?id=<?php echo $record['id'] ?>" class="btn btn-dark mb-3">Edit</a>
							<form action="delete_record_in_database.php" method="POST" class="pb-3">
								<input type="hidden" name="id" value="<?php echo $record['id'] ?>">
								<button type="submit" class="btn btn-dark">Delete</button>
							</form>

							<a href="add_tracks_page.php?id=<?php echo $record['id'] ?>" class="btn btn-dark mb-3">Add tracks</a>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>

	</div>
</body>

</html>