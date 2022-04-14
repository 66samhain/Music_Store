<?php

require_once "connect.php";

$connection = getConnection();

$id = $_GET['id'];

$sql = "SELECT artist, album_name, year, img_src, stock FROM records WHERE id = :id";
$query = $connection->prepare($sql);
$query->execute([
    "id" => $id
]);

$record = $query->fetch();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noisebleed Records</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h2>Add new record</h2>

        <form method="post" action="edit_record_in_database.php">
            <div class="mb-3">
                <label for="artist" class="form-label">Album artist</label>
                <input type="text" class="form-control" id="artist" name="artist" value="<?php echo $record['artist'] ?>">
            </div>

            <div class="mb-3">
                <label for="album_name" class="form-label">Album name</label>
                <input type="text" class="form-control" id="album_name" name="album_name" value="<?php echo $record['album_name'] ?>">
            </div>

            <div class="mb-3">
                <label for="year" class="form-label">Year released</label>
                <input type="text" class="form-control" id="year" name="year" value="<?php echo $record['year'] ?>">
            </div>

            <div class="mb-3">
                <label for="img_src" class="form-label">Image source</label>
                <input type="text" class="form-control" id="img_src", name="img_src" value="<?php echo $record['img_src'] ?>">
            </div>

            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="text" class="form-control" id="stock", name="stock" value="<?php echo $record['stock'] ?>">
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" id="price", name="price" value="<?php echo $record['price'] ?>">
            </div>

            <input name="id" type="hidden" value="<?php echo $id ?>">

            <button type="submit" class="btn btn-dark">Submit</button>
        </form>

    </div>
</body>

</html>