<?php

session_start();
$_SESSION["user_is_logged_in"] = false;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noisebleed Records</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">

        <div class="row d-flex justify-content-center pt-5">
            <div class="col-lg-4">
                <h2>Login</h2>

                <form method="post" action="check_login.php">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>

                    <button type="submit" class="btn btn-dark">Submit</button>
                </form>
            </div>

        </div>

    </div>
</body>
<script>
    $(document).ready(function () {
        var errorMessage = $.cookie('error_message');
        if (errorMessage) {
            alert(errorMessage)
            $.removeCookie("error_message");
        }
    })
</script>
</html>